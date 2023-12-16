<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    use HasFactory;
    public function levels(){
        return $this->belongsToMany('App\Models\level', 'level_semesters', 'semester_id', 'level_id');
    }
}
