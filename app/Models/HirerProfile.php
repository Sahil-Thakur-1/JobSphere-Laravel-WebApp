<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class HirerProfile extends Model
{
   protected $fillable = [
    'user_id',
    'company_name',
    'website',
    'company_size',
    'industry',
    'location',
    'company_description'
    ];

    public function user() {
    return $this->belongsTo(User::class);
    }
}
