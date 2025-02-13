<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // Specify the table name if it is different from the plural form of the model name
    protected $table = 'applications';

    // Fillable fields
    protected $fillable = [
        'user_id',
        'partner_id',
        'program_id',
        'status',
        'description',
    ];

    // Define relationships

    // An application belongs to a user (applicant)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An application belongs to a partner (approver)
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    // An application belongs to a program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
