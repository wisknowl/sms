<?php

namespace App\Livewire;

// use Livewire\Component;

use App\Models\course_student;
use App\Models\cycle;
use App\Models\level;
use App\Models\specialty;
use App\Models\student;
use App\Models\unite_enseignement;
use LivewireUI\Modal\ModalComponent;

class Mymodal extends ModalComponent
{
    public unite_enseignement $ue;
    public int $counter = 0;
    public $cycle_id;
    public $specialty_id;
    public $level_id;
    public $specialties;
    public $levels;
    public $noteDeliberation;
    public function mount()
    {
        $first_cycle = cycle::first();
        $this->cycle_id = $first_cycle->id;

        $this->updateSpecialties();
        $first_specialty = $this->specialties[0];
        $this->specialty_id = $first_specialty->id;

        $this->updateLevels();
        $first_level = $this->levels[0];
        $this->level_id = $first_level->id;
    }
    public function updateSpecialties()
    {
        $this->specialties = specialty::where('cycle_id', $this->cycle_id)->get();
    }
    public function update()
    {
        // $this->counter++;
        if (session()->has('year_name')) {
            $academic_year = session('year_name');
        }
        // dump($academic_year, $this->specialty_id, $this->level_id, $this->noteDeliberation);
        if ($this->noteDeliberation) {
            $students = student::where('specialty_id', $this->specialty_id)
                ->whereHas('levels', function ($query) use ($academic_year) {
                    $query->where('academic_year', $academic_year)->where('level_id', $this->level_id);
                })->get();
            foreach ($students as $student) {
                $course_students = course_student::where('student_id', $student->id)->whereHas('course', function ($query) {
                    $query->where('level_id', $this->level_id);
                })->get();
                $a = array();
                $b = array();
                foreach ($course_students as $course_student) {
                    if ($course_student->exam_marks < $course_student->reseat_mark) {
                        $a[$course_student->course->name] = $course_mark = (((((($course_student->ca_marks) / 20) * 30) + ((($course_student->reseat_mark) / 20) * 70)) / 100) * 20);
                    } else {
                        $a[$course_student->course->name] = $course_mark = (((((($course_student->ca_marks) / 20) * 30) + ((($course_student->exam_marks) / 20) * 70)) / 100) * 20);
                    }
                    if ($course_mark == $this->noteDeliberation || ($course_mark > $this->noteDeliberation && $course_mark < 10)) {
                        $addToExamMark = (10 - (3 * ($course_student->ca_marks) + 7 * ($course_student->exam_marks)) / 10) * (10 / 7);
                        $new_course_mark = (3 * ($course_student->ca_marks) + 7 * ($course_student->exam_marks + $addToExamMark)) / 10;
                        $b[$course_student->course->name] = $new_course_mark;
                        $newExamMark = $course_student->exam_marks + $addToExamMark;
                        $newExamMark = number_format(ceil($newExamMark * 100) / 100, 2, '.', '');
                        $updateDel = $course_student->update(['exam_marks' => $newExamMark]);
                    }
                }
                // dd($a, $b);
            }
            // dd(2);
        }
        $this->dispatch('closeModal');
    }
    public function updateLevels()
    {
        $this->levels = level::all();
    }
    public function render()
    {
        $cycles = cycle::all();

        return view('livewire.mymodal', compact('cycles'));
    }
    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '7xl';
    }
}
