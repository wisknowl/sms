<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ue_course extends Model
{
    public function ue()
    {
        return $this->belongsTo(unite_enseignement::class);
    }

    public function course()
    {
        return $this->belongsTo(course::class);
    }
    use HasFactory;
}
