<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $casts = [
    'start_date' => 'date',
    'end_date' => 'date'
    ];

    protected $fillable = [
    'user_id',
    'degree',
    'institution_name',
    'field_of_study',
    'start_date',
    'end_date',
    'percentage',
    'description',
     ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
