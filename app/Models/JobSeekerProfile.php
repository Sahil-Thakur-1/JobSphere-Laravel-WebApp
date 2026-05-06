<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JobSeekerProfile extends Model
{
    public function user() {
    return $this->belongsTo(User::class);
    }

    protected $fillable = [
            'user_id',
            'headline',
            'current_location' ,
            'experience' ,
            'expected_salary',
            'summary' ,
            'resume_url'
    ];
}
