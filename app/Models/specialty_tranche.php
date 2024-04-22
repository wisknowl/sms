<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialty_tranche extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function specialty()
    {
        return $this->belongsTo(specialty::class);
    }

    public function tranche()
    {
        return $this->belongsTo(tranche::class);
    }
}
