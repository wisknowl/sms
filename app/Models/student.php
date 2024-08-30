<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class student extends Model
{
    use HasFactory;


    // The attributes that are mass assignable
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'gender',
    //     'dob',
    //     'mobile',
    //     'specialty_id',
    // ];
    protected $guarded = [];


    // The attributes that should be hidden for arrays
    // protected $hidden = [
    //     'password',
    // ];


    // The specialty that the student belongs to
    public function specialty()
    {
        return $this->belongsTo(specialty::class);
    }
    public function studentSpecialty($specialty_id)
    {
        return $this->specialty()->find($specialty_id)->name;
    }

    public function cycle()
    {
        return $this->belongsTo(cycle::class);
    }

    public function course(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\course', 'course_students', 'student_id', 'course_id');
    }
    public function paper(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\paper', 'student_papers', 'student_id', 'paper_id');
    }
    public function levels()
    {
        return $this->belongsToMany('App\Models\Level', 'student_levels', 'student_id', 'level_id')
            ->withPivot('academic_year', 'pass_mark')
            ->withTimestamps();
    }

    public function currentLevel()
    {
        return $this->levels()->latest('academic_year')->first();
    }
    public function levelByYear($year)
    {
        return $this->levels()->where('academic_year', $year)->first();
    }

    /**
     * The unite enseignements that belong to the student.
     */
    public function ues(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\unite_enseignement', 'student_ues', 'student_id', 'ue_id')
            ->withPivot('average', 'credit')
            ->withTimestamps();
    }

    public function faturation(): HasMany
    {
        return $this->hasMany(facturation::class);
    }

    public function fature(): HasMany
    {
        return $this->hasMany(facture::class);
    }
}
