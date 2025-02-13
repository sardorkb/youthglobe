<?php

namespace App\Http\Controllers\Partner;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PartnerDetail;

class PartnerApplicationController extends Controller
{
    public function __construct()
    {
        // Make sure the partner is authenticated
        $this->middleware('auth:partner');
    }

    /**
     * Display a list of all applications for the authenticated partner.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Fetch all applications for the authenticated partner
        $applications = Application::where('partner_id', Auth::id())->get();

        return response()->json($applications);
    }

   
    public function show($id)
    {
        // Find the application by ID
        $application = Application::with('user', 'program')->findOrFail($id);
        $partnerDetails = PartnerDetail::where('partner_id', Auth::guard('partner')->id())->first();
        // Ensure the partner can only view applications they are assigned to
        if ($application->partner_id !== Auth::id()) {
            return redirect()->route('partner.applications.index')->with('error', 'Unauthorized');
        }
    
        return view('partner.applications.show', compact('application', 'partnerDetails'));
    }
    

    /**
     * Update the status of an application.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
{
    // Validate incoming request
    $validated = $request->validate([
        'status' => 'required|in:approved,rejected,pending', // Include 'pending' as well if needed
        'description' => 'nullable|string',
    ]);

    // Find the application and update
    $application = Application::findOrFail($id);

    // Ensure the partner can only update applications they are assigned to
    if ($application->partner_id !== Auth::id()) {
        return redirect()->route('partner.index')->with('error', 'Unauthorized');
    }

    // Update the application status and description
    $application->update($validated);

    // Redirect back to partner index with success message
    return redirect()->route('partner.index')->with('success', 'Application updated successfully');
}


    /**
     * Delete an application.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        // Ensure the partner can only delete applications they are assigned to
        if ($application->partner_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Delete the application
        $application->delete();

        return response()->json(null, 204); // Return successful deletion
    }
}
