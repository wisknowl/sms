<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialty_levels extends Model
{
    use HasFactory;
    public function levels()
    {
        return $this->belongsTo(level::class, 'level_id');
    }
    public function specialty()
    {
        return $this->belongsTo(specialty::class);
    }

    
}
