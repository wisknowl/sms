<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class course extends Model
{
    use HasFactory;
    

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
    
}
