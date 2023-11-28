<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialty_ue extends Model
{
    public function specialty()
    {
        return $this->belongsTo(specialty::class);
    }

    public function ue()
    {
        return $this->belongsTo(unite_enseignement::class);
    }
    use HasFactory;
}
