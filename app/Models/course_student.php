<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_student extends Model
{
    protected $guarded = [];

    use HasFactory;
    // either use this for mass assigning
    // protected $fillable = ['ca_marks', 'exam_marks'];

    // or use this
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function course()
    {
        return $this->belongsTo(course::class);
    }
}
