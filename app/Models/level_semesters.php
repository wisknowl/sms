<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level_semesters extends Model
{
    use HasFactory;
    public function level()
    {
        return $this->belongsTo(level::class);
    }

    public function semester()
    {
        return $this->belongsTo(semester::class);
    }
}
