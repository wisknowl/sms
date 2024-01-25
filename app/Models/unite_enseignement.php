<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class unite_enseignement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function specialties()
    {
        // return $this->belongsToMany('App\Models\specialty', 'specialty_ues','specialty_id', 'ue_id');
        return $this->belongsTo(specialty::class);
    }

    public function course(): HasMany
    {
        return $this->hasMany(course::class);
    }
    public function course_nature(){
        return $this->belongsTo(course_nature::class);
    }

    public function student(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\student','student_ues','student_id','ue_id')
                ->withPivot('average', 'credit')
                ->withTimestamps();
    }
    
}
