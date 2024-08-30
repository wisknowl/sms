<?php

namespace Database\Seeders;

use App\Models\academic_year;
use App\Models\student;
use App\Models\student_ue;
use App\Models\unite_enseignement;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $currentYear = date('Y');
        // $nextYear = $currentYear + 1;
        // academic_year::create([
        //     'name' => $currentYear . '-' . $nextYear,
        //     'start_date' => $currentYear . '-08-01',
        //     'end_date' => $nextYear . '-07-31',
        // ]);
        if (session()->has('year_name')) {
            $academic_year = session('year_name');
        }
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');

        $ue = unite_enseignement::find(274);
        // dd($ue);
        $st_ids = student::where('specialty_id', 20)->whereHas('levels', function ($query) {
            $query->where('level_id', 11);
        })->pluck('id')->toArray();
        // dd($st_ids);
        foreach($st_ids as $st_id){
            student_ue::create([
                'student_id' => $st_id,
                'ue_id' => 274
            ]);
        }
        // $ue->student()->attach($st_ids, ['created_at' => $timestamp, 'updated_at' => $timestamp]);

    }
}
