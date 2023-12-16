<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cycle_levels extends Model
{
    use HasFactory;
    public function cycle()
    {
        return $this->belongsTo(cyle::class);
    }

    public function levels()
    {
        return $this->belongsTo(level::class);
    }
}
