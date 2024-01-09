<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class specialty extends Model
{
    use HasFactory;
    // public function ues(): BelongsToMany
    // {
    //     return $this->belongsToMany('App\Models\unite_enseignement', 'specialty_ues','specialty_id', 'ue_id');
    // }
    public function ues(){
        return $this->hasMany(unite_enseignement::class);
    }
    
    public function cycle()
    {
        return $this->belongsTo(cycle::class);
    }
    
    public function levels(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\level', 'specialty_levels', 'level_id', 'specialty_id');
    }

    public function students(){
        return $this->hasMany(student::class);
    }
}
