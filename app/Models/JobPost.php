<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Models\User;
use  App\Models\Skill;

class JobPost extends Model
{
    public function user() {
    return $this->belongsTo(User::class);
    }

    public function skills(){
    return $this->belongsToMany(Skill::class);
    }

    public function applicants(){
        return $this->belongsToMany(User::class, 'job_applications')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    protected $fillable = [
    'user_id',
    'title',
    'description',
    'location',
    'job_type',
    'salary_min',
    'salary_max',
];
}
