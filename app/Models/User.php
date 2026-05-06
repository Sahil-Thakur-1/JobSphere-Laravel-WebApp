<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\HirerProfile;
use App\Models\JobSeekerProfile;
use App\Models\WorkExperience;
use App\Models\JobPost;
use App\Models\Skill;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function hirerProfile() {
    return $this->hasOne(HirerProfile::class);
    }

    public function jobPosts(){
        return $this->hasMany(JobPost::class);
    }

    public function jobSeekerProfile(){
        return $this->hasOne(JobSeekerProfile::class);
    }

    public function workExperiences(){
        return $this->hasMany(WorkExperience::class);
    }

    public function skills(){
    return $this->belongsToMany(Skill::class,'user_skills')
                ->withPivot('level')
                ->withTimestamps();
    }

    public function appliedJobs(){
    return $this->belongsToMany(JobPost::class, 'job_applications')
                ->withPivot('status')
                ->withTimestamps();
    }

    public function educations(){
    return $this->hasMany(Education::class);
    }
}
