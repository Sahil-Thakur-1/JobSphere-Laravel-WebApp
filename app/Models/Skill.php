<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Models\JobPost;
use App\Models\User;

class Skill extends Model
{
    public function jobs(){
    return $this->belongsToMany(JobPost::class);
    }

    public function user(){
    return $this->belongsToMany(User::class,'user_skills')
            ->withPivot('level')
            ->withTimestamps();
    }
}
