<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class level extends Model
{
    use HasFactory;
    public function cycles(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\cycle', 'cycle_levels', 'cycle_id', 'level_id');
    }
    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\specialty', 'specialty_levels','level_id', 'specialty_id');
    }
    public function semester(){
        return $this->belongsToMany('App\Models\semester', 'level_semesters', 'semester_id', 'level_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_levels')
            ->withPivot('academic_year', 'pass_mark')
            ->withTimestamps();
    }
}
