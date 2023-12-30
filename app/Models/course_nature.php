<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_nature extends Model
{
    use HasFactory;
    public function ues(){
        return $this->hasMany(unite_enseignement::class);
    }
}
