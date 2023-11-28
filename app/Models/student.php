<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // The attributes that should be cast to native types
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // The "booted" method of the model
    // protected static function booted()
    // {
    //     // Register a creating model event with the dispatcher
    //     static::creating(function ($student) {
    //         // Generate a version 4 UUID and assign it to the matricule attribute
    //         $student->matricule = Uuid::uuid4()->toString();
    //     });
    // }

    // The specialty that the student belongs to
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
