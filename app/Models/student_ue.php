<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_ue extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(student::class);
    }

    public function ue()
    {
        return $this->belongsTo(unite_enseignement::class);
    }
    use HasFactory;
}
