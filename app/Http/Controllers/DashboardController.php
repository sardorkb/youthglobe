<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard.
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve user details from the database
        $userDetails = UserDetails::where('user_id', $user->id)->first();
        if (!$userDetails) {
            $userDetails = new UserDetails(); // Empty instance for the view to allow filling in data
        }
        // Fetch all applications for the authenticated user, including the related program
    $applications = Application::with('program') // Eager load the program relationship
    ->where('user_id', Auth::id()) // Only fetch the applications for the authenticated user
    ->orderBy('updated_at', 'desc') // Order by the most recent update
    ->get();
        return view('frontend.dashboard', compact('user', 'userDetails', 'applications'));
    }
    
}
