<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class tranche extends Model
{
    use HasFactory;

    public function tranche(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\specialty', 'specialty_id', 'tranche_id', 'tranche_amount');
    }
}
