<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;

class UserDetailsController extends Controller
{
    // Show the form to create user details
    public function create()
    {
        return view('user.details.create'); // Create user details view
    }

    // Store user details
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'address' => 'required|string|max:255',
            'place_of_study' => 'required|string|max:255',
            'passport_copy' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'confirmation_letter' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'academic_transcript' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'motivation_letter' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'resume' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'cover_letter' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
        ]);

        // Create a new UserDetails instance and populate it
        $userDetail = new UserDetails([
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'place_of_study' => $request->place_of_study,
        ]);

        // Handle file uploads for each document
        if ($request->hasFile('passport_copy')) {
            $filePath = $request->file('passport_copy')->store('documents', 'public');
            $userDetail->passport_copy = $filePath;
        }

        if ($request->hasFile('confirmation_letter')) {
            $filePath = $request->file('confirmation_letter')->store('documents', 'public');
            $userDetail->confirmation_letter = $filePath;
        }

        if ($request->hasFile('academic_transcript')) {
            $filePath = $request->file('academic_transcript')->store('documents', 'public');
            $userDetail->academic_transcript = $filePath;
        }

        if ($request->hasFile('motivation_letter')) {
            $filePath = $request->file('motivation_letter')->store('documents', 'public');
            $userDetail->motivation_letter = $filePath;
        }

        if ($request->hasFile('resume')) {
            $filePath = $request->file('resume')->store('documents', 'public');
            $userDetail->resume = $filePath;
        }

        if ($request->hasFile('cover_letter')) {
            $filePath = $request->file('cover_letter')->store('documents', 'public');
            $userDetail->cover_letter = $filePath;
        }

        // Save the user details for the authenticated user
        $user = Auth::user();
        $user->details()->save($userDetail);

        return redirect()->route('dashboard')->with('success', 'User details submitted successfully!');
    }

    // Update user details
    public function update(Request $request, $id)
    {
        $request->validate([
            'phone_number' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'address' => 'required|string|max:255',
            'place_of_study' => 'required|string|max:255',
            'passport_copy' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'confirmation_letter' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'academic_transcript' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'motivation_letter' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'resume' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'cover_letter' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
        ]);

        // Find the user details by ID
        $userDetail = UserDetails::findOrFail($id);

        // Update the user details
        $userDetail->phone_number = $request->phone_number;
        $userDetail->date_of_birth = $request->date_of_birth;
        $userDetail->address = $request->address;
        $userDetail->place_of_study = $request->place_of_study;

        // Handle file uploads if new files are uploaded
        if ($request->hasFile('passport_copy')) {
            $filePath = $request->file('passport_copy')->store('documents', 'public');
            $userDetail->passport_copy = $filePath;
        }

        if ($request->hasFile('confirmation_letter')) {
            $filePath = $request->file('confirmation_letter')->store('documents', 'public');
            $userDetail->confirmation_letter = $filePath;
        }

        if ($request->hasFile('academic_transcript')) {
            $filePath = $request->file('academic_transcript')->store('documents', 'public');
            $userDetail->academic_transcript = $filePath;
        }

        if ($request->hasFile('motivation_letter')) {
            $filePath = $request->file('motivation_letter')->store('documents', 'public');
            $userDetail->motivation_letter = $filePath;
        }

        if ($request->hasFile('resume')) {
            $filePath = $request->file('resume')->store('documents', 'public');
            $userDetail->resume = $filePath;
        }

        if ($request->hasFile('cover_letter')) {
            $filePath = $request->file('cover_letter')->store('documents', 'public');
            $userDetail->cover_letter = $filePath;
        }

        // Save the updated user details
        $userDetail->save();

        return redirect()->route('dashboard')->with('success', 'User details updated successfully!');
    }
}
