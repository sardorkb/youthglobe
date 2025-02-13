<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Program; // Make sure to import the Program model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure the user is authenticated
    }

    /**
     * Store a newly created application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'description' => 'nullable|string',
        ]);

        // Check if the user already has an active application
        $existingApplication = Application::where('user_id', Auth::id())
                                        ->whereIn('status', ['pending', 'approved', 'rejected'])
                                        ->first();

        if ($existingApplication) {
            return response()->json(['error' => 'You already have an active application. Please wait for it to be processed.'], 400);
        }

        // Fetch the program to get the partner_id
        $program = Program::findOrFail($validated['program_id']);

        // Associate the application with the authenticated user
        $validated['user_id'] = Auth::id();
        $validated['partner_id'] = $program->partner_id; // Set partner_id from the selected program
        $validated['status'] = 'pending'; // Set the default status to 'pending'

        // Create new application
        $application = Application::create($validated);

        // Redirect the user to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Application submitted successfully!');
    }


    /**
     * Update the specified application.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'description' => 'nullable|string',
        ]);

        // Find the application and update it
        $application = Application::findOrFail($id);

        // Ensure that the user can only update their own application
        if ($application->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Update the application status and description
        $application->update($validated);

        return response()->json($application); // Return the updated application
    }

    /**
     * Display the specified application.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Fetch application by ID
        $application = Application::findOrFail($id);

        // Ensure that the user can only view their own application
        if ($application->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($application);
    }

    /**
     * Display a list of all applications for the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Fetch all applications for the authenticated user
        $applications = Application::where('user_id', Auth::id())->get();

        return response()->json($applications);
    }

    /**
     * Remove the specified application from the database.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Fetch and delete the application
        $application = Application::findOrFail($id);

        // Ensure that the user can only delete their own application
        if ($application->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $application->delete();

        return response()->json(null, 204); // Successful deletion
    }
}
