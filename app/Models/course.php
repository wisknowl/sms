<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class course extends Model
{
    use HasFactory;
    public function ues(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\unite_enseignement', 'ue_courses','ue_id', 'course_id');
    }
}
