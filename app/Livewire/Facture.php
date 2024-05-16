<?php

namespace App\Livewire;

use App\Models\academic_year;
use App\Models\cycle;
use App\Models\facturation;
use App\Models\level;
use App\Models\semester;
use Livewire\Component;
use App\Models\specialty as ModelsSpecialty;
use App\Models\specialty_tranche;
use App\Models\student;
use Livewire\WithPagination;
use Carbon\Carbon;
use Session;

class Facture extends Component
{
    use WithPagination;
    public $academic_year;
    public $search;
    public $cycle;
    public $start_date;
    public $end_date;
    public $validated;
    // public $students;

    public function facture_list()
    {
        dd(1);
    }
    public function fl()
    {
    }
    public function fs()
    {
        // dd($this->start_date, $this->end_date);
    }
    protected $rules = [
        'start_date' => 'required|date_format:d/m/Y',
        'end_date' => 'required|date_format:d/m/Y',
    ];
    public function updated()
    {
        $this->validated = true;

        // Validate start_date
        try {
            $this->validateOnly('start_date', [
                'start_date' => 'required|date_format:d/m/Y',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->validated = false;
            // Optionally, add error message for start_date
            $this->addError('start_date', 'The start date format is invalid.');
        }

        // Validate end_date
        try {
            $this->validateOnly('end_date', [
                'end_date' => 'required|date_format:d/m/Y',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->validated = false;
            // Optionally, add error message for end_date
            $this->addError('end_date', 'The end date format is invalid.');
        }
    }
    // public function updated($propertyName)
    // {
    //     try {
    //         $this->validateOnly($propertyName);
    //         $this->validated = false;
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         $this->validated = false;
    //     }
    // }
    public function render()
    {
        $semesters = semester::all();
        $academic_years = academic_year::all();
        $cycles = cycle::all();
        $factures = facturation::with('student')->orderBy('id', 'desc');
        // dd($factures);
        $students = student::all();
        // $factures->when($this->cycle, function ($query) {
        //     return $query->where('cycle_id', $this->cycle);
        // })
        $factures->when($this->search, function ($query) {
            return $query->where(function ($query) {
                $query->where('pdf_name', 'like', '%' . $this->search . '%')
                    // ->orwhere('code', 'like', '%' . $this->search . '%')
                    ->orwhere('reference_id', 'like', '%' . $this->search . '%')
                    ->orwhereHas('student', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        })
            ->when($this->start_date && $this->end_date, function ($query) {
                if ($this->validated) {
                    $start = Carbon::createFromFormat('d/m/Y', $this->start_date)->startOfDay();
                    $end = Carbon::createFromFormat('d/m/Y', $this->end_date)->endOfDay();
                    return $query->whereBetween('created_at', [$start, $end]);
                } else {
                    notify()->error('Entrez le bon format de date j/m/a');
                }
            })
            ->get();
        
        // $sql = $factures->toSql();
        $factures = $factures->paginate(12);
        $facture_remaining_amount = [];
        foreach ($factures as $facture) {
            // dd($facture->student_id, $facture->level_id, $facture->academic_year);
            $student = student::findOrFail($facture->student_id);
            $year_session = Session::get('year_name');
            $level_id = $student->levelByYear($year_session)->id;
            $specialty_id = $student->specialty_id;
            $specialty_name = ModelsSpecialty::find($specialty_id)->name;
            $level_name = level::find($level_id)->name;
            $period = $student->period;
            $specialty_tranches = specialty_tranche::with('tranche', 'specialty')
                ->where('specialty_id', $specialty_id)->where('period', $period)->where('level_id', $level_id)->get();
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
            $totalTrancheAmounts = [
                'inscription' => $inscription,
                'first' => $first,
                'second' => $second,
                'third' => $third
            ];

            $paidAmounts = Facturation::where('student_id', $facture->student_id)->where('level_id', $facture->level_id)->where('academic_year', $facture->academic_year)
                ->where('id', '<=', $facture->id)
                ->get()
                ->reduce(function ($carry, $item) {
                    $carry['inscription'] += $item->inscription;
                    $carry['tranche1'] += $item->tranche1;
                    $carry['tranche2'] += $item->tranche2;
                    $carry['tranche3'] += $item->tranche3;
                    return $carry;
                }, ['inscription' => 0, 'tranche1' => 0, 'tranche2' => 0, 'tranche3' => 0]);

            $remainingAmounts = [
                'inscription' => $totalTrancheAmounts['inscription'] - $paidAmounts['inscription'],
                'tranche1' => $totalTrancheAmounts['first'] - $paidAmounts['tranche1'],
                'tranche2' => $totalTrancheAmounts['second'] - $paidAmounts['tranche2'],
                'tranche3' => $totalTrancheAmounts['third'] - $paidAmounts['tranche3']
            ];
            $sumRemainingAmounts = $remainingAmounts['inscription'] + $remainingAmounts['tranche1'] + $remainingAmounts['tranche2'] + $remainingAmounts['tranche3'];
            $facture_remaining_amount[$facture->id] = $sumRemainingAmounts;
        }
        config(['app.name' => 'Specialite']);
        return view('livewire.facture', compact('factures', 'academic_years', 'semesters', 'cycles', 'students','facture_remaining_amount'));
    }
}
