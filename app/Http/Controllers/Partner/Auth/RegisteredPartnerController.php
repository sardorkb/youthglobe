<?php

namespace App\Http\Controllers\Partner\Auth;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredPartnerController extends Controller
{
    public function create()
    {
        return view('partner.auth.register');
    }

    public function store(Request $request)
    {
        // Validate the partner data
        $request->validate([
            'username' => 'required|string|max:255|unique:partners',
            'email' => 'required|string|email|max:255|unique:partners',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create the partner and set the status (e.g., 'pending')
        $partner = Partner::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'pending',  // Default status
        ]);

        // Log the partner in
        Auth::login($partner);

        // Redirect to login page with success message
        return redirect()->route('partner.index')->with('success', 'Registration successful. Please login.');
    }
}
