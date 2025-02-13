<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'type',
        'company_name',
        'address',
        'phone_number',
        'additional_email',
        'year_of_establishment',
        'cert_license_file',
        'rating',
        'description',
        'website_link',
    ];

    // Relationship with Partner
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
