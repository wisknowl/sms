<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class paper extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function student(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\student', 'student_papers', 'student_id', 'paper_id');
    }

}
