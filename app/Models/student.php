<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class student extends Model
{
    use HasFactory;
    

    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'gender',
        'dob',
        'mobile',
        'specialty_id',
    ];

    // The attributes that should be hidden for arrays
    // protected $hidden = [
    //     'password',
    // ];


    // The specialty that the student belongs to
    public function specialty()
    {
        return $this->belongsTo(specialty::class);
    }

    public function cycle()
    {
        return $this->belongsTo(cycle::class);
    }

    public function course(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\course', 'course_students','student_id', 'course_id');
    }
    public function levels()
    {
        return $this->belongsToMany(Level::class, 'student_levels')
            ->withPivot('academic_year', 'pass_mark')
            ->withTimestamps();
    }

    public function currentLevel()
    {
        return $this->levels()->latest('academic_year')->first();
    }

    /**
     * The unite enseignements that belong to the student.
     */
    public function uniteEnseignements(): BelongsToMany
    {
        return $this->belongsToMany(UniteEnseignement::class);
    }
}
