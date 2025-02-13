<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'date_of_birth',
        'address',
        'passport_copy',
        'place_of_study',
        'confirmation_letter',
        'academic_transcript',
        'motivation_letter',
        'resume',
        'cover_letter',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
