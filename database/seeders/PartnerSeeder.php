<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a partner account
        Partner::create([
            'username' => 'partner',
            'email' => 'partner@example.com',
            'password' => Hash::make('12345'), // Password should be hashed
            'status' => 'active', // Default status for the partner
        ]);
    }
}
