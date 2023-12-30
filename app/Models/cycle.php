<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class cycle extends Model
{
    use HasFactory;
    public function specialties(): HasMany
    {
        return $this->hasMany(specialty::class);
    }
    public function students(): HasMany
    {
        return $this->hasMany(student::class);
    }
    public function levels(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\level', 'cycle_levels', 'cycle_id', 'level_id');
    }
}
