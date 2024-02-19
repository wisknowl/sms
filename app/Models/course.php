<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\student', 'course_students','student_id', 'course_id');
    }
    /**
     * The specialties that belong to the course.
     */
    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(specialty::class);
    }
    public function ue(){
        return $this->belongsTo(unite_enseignement::class);
    }
    public function level(){
        return $this->belongsTo(level::class);
    }
}
