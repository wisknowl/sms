<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class unite_enseignement extends Model
{
    use HasFactory;
    public function specialty(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\specialty', 'specialty_ues','specialty_id', 'ue_id');
    }
}
