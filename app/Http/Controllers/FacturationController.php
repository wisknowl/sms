<?php

namespace App\Http\Controllers;

use Session;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\facturation;
use App\Models\facture;
use App\Models\specialty;
use App\Models\specialty_tranche;
use App\Models\student;
use App\Models\tranche;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;



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
        $specialty_id = $student->specialty_id;
        $specialty_tranches = specialty_tranche::with('tranche')->where('specialty_id', $specialty_id)->get();
        foreach ($specialty_tranches as $specialty_tranche) {
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
        // dd($first, $second, $third);
        // Define the total amounts for each tranche
        $totalTrancheAmounts = [
            'first' => $first,
            'second' => $second,
            'third' => $third
        ];

        // Sum up all the amounts paid for each tranche
        $paidAmounts = Facturation::where('student_id', $student_id)
            ->get()
            ->reduce(function ($carry, $item) {
                $carry['tranche1'] += $item->tranche1;
                $carry['tranche2'] += $item->tranche2;
                $carry['tranche3'] += $item->tranche3;
                return $carry;
            }, ['tranche1' => 0, 'tranche2' => 0, 'tranche3' => 0]);

        // dump($paidAmounts);
        // Calculate the remaining amounts for each tranche
        $remainingAmounts = [
            'tranche1' => $totalTrancheAmounts['first'] - $paidAmounts['tranche1'],
            'tranche2' => $totalTrancheAmounts['second'] - $paidAmounts['tranche2'],
            'tranche3' => $totalTrancheAmounts['third'] - $paidAmounts['tranche3']
        ];

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
        $montant = strip_tags($request->input('montant'));

        $deposit_date = $newFacturation->created_at;

        $paidAmounts = Facturation::where('student_id', $student_id)
            ->get()
            ->reduce(function ($carry, $item) {
                $carry['tranche1'] += $item->tranche1;
                $carry['tranche2'] += $item->tranche2;
                $carry['tranche3'] += $item->tranche3;
                return $carry;
            }, ['tranche1' => 0, 'tranche2' => 0, 'tranche3' => 0]);

        // dd($paidAmounts);

        // Calculate the remaining amounts for each tranche
        $remainingAmounts = [
            'tranche1' => $totalTrancheAmounts['first'] - $paidAmounts['tranche1'],
            'tranche2' => $totalTrancheAmounts['second'] - $paidAmounts['tranche2'],
            'tranche3' => $totalTrancheAmounts['third'] - $paidAmounts['tranche3']
        ];
        // dump($save);
        $year_session = Session::get('year_name');
        $level = $student->levelByYear($year_session);
        $specialty = specialty::findOrFail($specialty_id);

        $tranches = tranche::all();
        $specialty_tranches = specialty_tranche::where('specialty_id', $specialty_id)->where('period', 'jour')->get();
        // Output the remaining amounts after distribution
        // dd($specialty_tranches);
        // notify()->success('Facture creer avec succes');
        // return redirect()->back();
        $referenceId = $this->generateReferenceId();

        $pdf = Pdf::loadView('facture.pdf', compact('student', 'specialty', 'level', 'tranches', 'specialty_tranches', 'montant', 'deposit_date', 'paidAmounts', 'remainingAmounts','referenceId'));
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
        notify()->success('Facture Créer  avec succès');
        return redirect()->back();
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
