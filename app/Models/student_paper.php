<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_paper extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function paper()
    {
        return $this->belongsTo(paper::class);
    }
}
