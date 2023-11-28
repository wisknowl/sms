<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class specialty extends Model
{
    use HasFactory;
    public function ues(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\unite_enseignement', 'specialty_ues','specialty_id', 'ue_id');
    }
}
