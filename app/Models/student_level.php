<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_level extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(student::class);
    }

    public function level()
    {
        return $this->belongsTo(level::class);
    }
}
