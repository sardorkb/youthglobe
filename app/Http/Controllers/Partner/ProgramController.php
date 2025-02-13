<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\PartnerDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    
    public function create()
    {
        // Get the authenticated partner
        $partner = auth()->guard('partner')->user(); // Using 'partner' guard if needed

        $partnerDetails = PartnerDetail::where('partner_id', Auth::guard('partner')->id())->first();
        // Check if the partner's status is active
        if ($partner->status !== 'active') {
            // Redirect back with an error if the partner is not active
            return redirect()->route('partner.index')->with('error', 'Your account is not active. You cannot create programs.');
        }

        return view('partner.programs.create', compact('partnerDetails'));
    }

    
    public function store(Request $request)
    {
        // Get the authenticated partner
        $partner = auth()->guard('partner')->user();

        // Check if the partner's status is active
        if ($partner->status !== 'active') {
            return redirect()->route('partner.index')->with('error', 'Your account is not active. You cannot create programs.');
        }

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string|max:100',
            'duration' => 'required|string',
            'requirements' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'deadline' => 'required|date|before:end_date',
            'cost' => 'required|numeric',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle file upload if an image is provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('program_images', 'public');
        }

        // Create the program (slug will be generated automatically)
        Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'country' => $request->country,
            'duration' => $request->duration,
            'requirements' => $request->requirements,
            'image' => $imagePath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'deadline' => $request->deadline,
            'cost' => $request->cost,
            'partner_id' => $partner->id, 
            'status' => $request->status,
        ]);

        // Redirect to the list of programs
        return redirect()->route('partner.index')->with('success', 'Program created successfully.');
    }


    
    public function show($slug)
    {
        $partnerDetails = PartnerDetail::where('partner_id', Auth::guard('partner')->id())->first();
        // Fetch program by slug
        $program = Program::getProgramBySlug($slug);

        // Pass program to view
        return view('partner.programs.show', compact('program', 'partnerDetails'));
    }


    
    public function index()
    {
        // Get the authenticated partner
        $partner = auth()->guard('partner')->user(); // Using 'partner' guard if needed

        // Fetch the programs created by the partner
        $programs = Program::where('partner_id', $partner->id)->get();

        return view('partner.programs.index', compact('programs')); // Make sure this view exists
    }

    public function edit($slug)
    {
        $partner = auth()->guard('partner')->user();
        $partnerDetails = PartnerDetail::where('partner_id', Auth::guard('partner')->id())->first();

        // Fetch program by slug
        $program = Program::where('slug', $slug)->where('partner_id', $partner->id)->firstOrFail();

        return view('partner.programs.edit', compact('program', 'partnerDetails'));
    }

    // Update program
    public function update(Request $request, $slug)
    {
        $partner = auth()->guard('partner')->user();

        // Validate the data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string|max:100',
            'duration' => 'required|string',
            'requirements' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'deadline' => 'required|date|before:end_date',
            'cost' => 'required|numeric',
            'status' => 'required|in:active,inactive',
        ]);

        // Find the program by slug and partner_id
        $program = Program::where('slug', $slug)->where('partner_id', $partner->id)->firstOrFail();

        // Handle file upload if a new image is provided
        $imagePath = $program->image; // Keep the old image by default
        if ($request->hasFile('image')) {
            // Delete the old image if it's replaced
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            $imagePath = $request->file('image')->store('program_images', 'public');
        }

        // Update the program
        $program->update([
            'title' => $request->title,
            'description' => $request->description,
            'country' => $request->country,
            'duration' => $request->duration,
            'requirements' => $request->requirements,
            'image' => $imagePath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'deadline' => $request->deadline,
            'cost' => $request->cost,
            'status' => $request->status,
        ]);

        return redirect()->route('program.show', ['slug' => $program->slug])->with('success', 'Program updated successfully.');
    }

    public function destroy($slug)
    {
        $partner = auth()->guard('partner')->user();
        $program = Program::where('slug', $slug)->where('partner_id', $partner->id)->firstOrFail();

        // Delete the program's image if it exists
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }

        // Delete the program
        $program->delete();

        return redirect()->route('partner.index')->with('success', 'Program deleted successfully.');
    }
    
}
