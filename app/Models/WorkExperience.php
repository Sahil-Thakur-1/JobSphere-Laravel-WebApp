<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class WorkExperience extends Model
{ 
   public function user() {
    return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
    'user_id',
    'company_name',
    'job_role',
    'start_date',
    'end_date',
    'description',
    ];

    protected $casts = [
    'start_date' => 'date',
    'end_date' => 'date',
    ];
}
