<?php

namespace App\Http\Controllers;

use App\Models\level;
use Session;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\facturation;
use App\Models\facture;
use App\Models\specialty;
use App\Models\specialty_tranche;
use App\Models\student;
use App\Models\tranche;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class FacturationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): view
    {
        return view('facture.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $montant = strip_tags($request->input('montant'));
        $student_id = strip_tags($request->input('student_id'));
        $student = student::findOrFail($student_id);
        $year_session = Session::get('year_name');
        $level = $student->levelByYear($year_session)->id;
        $specialty_id = $student->specialty_id;

        $specialty_name = specialty::find($specialty_id)->name;
        $level_name = level::find($level)->name;
        $period = $student->period;

        $specialty_tranches = specialty_tranche::with('tranche', 'specialty')
            ->where('specialty_id', $specialty_id)->where('period', $period)->where('level_id', $level)->get();
        if ($specialty_tranches->isEmpty()) {
            notify()->error('Aucune tranche n\'a été créé pour' . ' ' . $specialty_name . ' ' . 'Niveau' . ' ' . $level_name . ' ' . 'Cour du ' . $period);
            return redirect()->back();
        } else {
            $inscription = null;
            $first = null;
            $second = null;
            $third = null;

            foreach ($specialty_tranches as $specialty_tranche) {
                if ($specialty_tranche->tranche->name == 'inscription') {
                    $inscription = $specialty_tranche->tranche_amount;
                }
                if ($specialty_tranche->tranche->name == 'first') {
                    $first = $specialty_tranche->tranche_amount;
                }
                if ($specialty_tranche->tranche->name == 'second') {
                    $second = $specialty_tranche->tranche_amount;
                }
                if ($specialty_tranche->tranche->name == 'third') {
                    $third = $specialty_tranche->tranche_amount;
                }
            }

            if ($inscription === null || $first === null || $second === null || $third === null) {
                notify()->error('Vous n\'avez pas créé toutes les tranches pour' . ' ' . $specialty_tranche->specialty->name . ' ' . 'Niveau' . ' ' . $level_name . ' ' . 'Cour du ' . $period);
                return redirect()->back();
            }

            // dd($first, $second, $third);
            // Define the total amounts for each tranche
            $totalTrancheAmounts = [
                'inscription' => $inscription,
                'first' => $first,
                'second' => $second,
                'third' => $third
            ];

            // Sum up all the amounts paid for each tranche
            $paidAmounts = Facturation::where('student_id', $student_id)
                ->get()
                ->reduce(function ($carry, $item) {
                    $carry['inscription'] += $item->inscription;
                    $carry['tranche1'] += $item->tranche1;
                    $carry['tranche2'] += $item->tranche2;
                    $carry['tranche3'] += $item->tranche3;
                    return $carry;
                }, ['inscription' => 0, 'tranche1' => 0, 'tranche2' => 0, 'tranche3' => 0]);

            // dump($paidAmounts);
            // Calculate the remaining amounts for each tranche
            $remainingAmounts = [
                'inscription' => $totalTrancheAmounts['inscription'] - $paidAmounts['inscription'],
                'tranche1' => $totalTrancheAmounts['first'] - $paidAmounts['tranche1'],
                'tranche2' => $totalTrancheAmounts['second'] - $paidAmounts['tranche2'],
                'tranche3' => $totalTrancheAmounts['third'] - $paidAmounts['tranche3']
            ];
            $sumRemainingAmounts = 0;
            foreach ($remainingAmounts as $remainingAmount) {
                $sumRemainingAmounts = $sumRemainingAmounts + $remainingAmount;
            }
            if ($sumRemainingAmounts == 0) {
                notify()->error($student->name . ' a complété tous ses frais de scolarité');
                return redirect()->back();
            } else {

                // dd($remainingAmounts);
                // Distribute the montant across the tranches
                $newFacturation = new Facturation();
                $newFacturation->student_id = $student_id;
                foreach ($remainingAmounts as $key => &$remainingAmount) {
                    // dump($montant, $key, $remainingAmount);

                    if ($montant > 0 && $remainingAmount > 0) {
                        $amountToDeduct = min($montant, $remainingAmount);
                        // dump($amountToDeduct);
                        $newFacturation->$key = $amountToDeduct;

                        $montant -= $amountToDeduct;
                        // $remainingAmount -= $amountToDeduct;
                    }
                }
                // dump($newFacturation);

                $save = $newFacturation->save();
                $deposited_amount = $newFacturation->inscription + $newFacturation->tranche1 + $newFacturation->tranche2 + $newFacturation->tranche3;
                $dateFromDatabase = $newFacturation->created_at;

                $carbonDate = new Carbon($dateFromDatabase);

                // Format the date-time to the desired format
                $deposit_date = $carbonDate->format('d-m-Y H:i:s');
                $paidAmounts = Facturation::where('student_id', $student_id)
                    ->get()
                    ->reduce(function ($carry, $item) {
                        $carry['inscription'] += $item->inscription;
                        $carry['tranche1'] += $item->tranche1;
                        $carry['tranche2'] += $item->tranche2;
                        $carry['tranche3'] += $item->tranche3;
                        return $carry;
                    }, ['inscription' => 0, 'tranche1' => 0, 'tranche2' => 0, 'tranche3' => 0]);

                // dd($paidAmounts);

                $remainingAmounts = [
                    'inscription' => $totalTrancheAmounts['inscription'] - $paidAmounts['inscription'],
                    'tranche1' => $totalTrancheAmounts['first'] - $paidAmounts['tranche1'],
                    'tranche2' => $totalTrancheAmounts['second'] - $paidAmounts['tranche2'],
                    'tranche3' => $totalTrancheAmounts['third'] - $paidAmounts['tranche3']
                ];
                // dump($save);
                // $year_session = Session::get('year_name');
                $level = $student->levelByYear($year_session);
                $specialty = specialty::findOrFail($specialty_id);

                $tranches = tranche::all();
                $referenceId = $this->generateReferenceId();
                $paymentSummary = facturation::where('student_id', $student_id)->orderBy('id', 'asc')->get();

                $pdf = Pdf::loadView('facture.pdf', compact('student', 'specialty', 'level','year_session','paymentSummary', 'tranches', 'specialty_tranches', 'deposited_amount', 'deposit_date', 'paidAmounts', 'remainingAmounts', 'referenceId'));
                $pdf->setPaper('a4', 'landscape');


                $fileName = $student->matricule . '-' . $referenceId  . '.pdf';

                $pdfFilePath = storage_path('app/public/factures/' . $fileName);
                $pdf->save($pdfFilePath);

                $newFacturation->pdf_name = $fileName;
                $newFacturation->reference_id = $referenceId;
                $newFacturation->save();
                // Store the PDF file name in the database
                // $facture = new facture();
                // $facture->student_id = $student_id;
                // $facture->facturaton_id = $newFacturation->id;
                // $facture->reference_id = $referenceId;
                // $facture->pdf_name = $fileName;
                // $facture->save();
                notify()->success('Facture créée avec succès');
                return redirect()->back();
            }
        }
    }
    

    const char = 'FF';
    const SEQUENCE_LENGTH = 4;
    const STARTING_NUMBER = 0000;

    // Define the generateMatricule function
    function generateReferenceId()
    {
        // Get the last two digits of the current year
        $year = date('y');
        // Get the count of the students in the database, or zero if none exists
        $count = facturation::count();
        // Add the count to the starting number to get the sequence number
        $sequence = FacturationController::STARTING_NUMBER + $count;
        // Pad the sequence number with zeros to match the sequence length
        $sequence = str_pad($sequence, FacturationController::SEQUENCE_LENGTH, '0', STR_PAD_LEFT);
        // Concatenate the year, school name, and sequence to form the matricule
        $referenceId = $year . FacturationController::char . $sequence;
        // Return the matricule
        return $referenceId;
    }

    /**
     * Display the specified resource.
     */
    public function show(facturation $facturation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(facturation $facturation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, facturation $facturation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(facturation $facturation)
    {
        //
    }
}
