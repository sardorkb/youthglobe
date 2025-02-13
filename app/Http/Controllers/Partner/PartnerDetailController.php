<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartnerDetail;
use Illuminate\Support\Facades\Auth;

class PartnerDetailController extends Controller
{
    // Show the form to create partner details (if applicable)
    public function create()
    {
        return view('partner.details.create'); // You may need a view for the initial create.
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'additional_email' => 'nullable|email',
            'year_of_establishment' => 'required|integer|digits:4',
            'description' => 'nullable|string|max:1000',
            'website_link' => 'nullable|url|max:255',
            'cert_license_file' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'rating' => 'nullable|numeric|between:0,5',
        ]);

        $partnerDetail = new PartnerDetail([
            'company_name' => $request->company_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'additional_email' => $request->additional_email,
            'year_of_establishment' => $request->year_of_establishment,
            'description' => $request->description,
            'website_link' => $request->website_link,
            'rating' => $request->rating,
        ]);

        if ($request->hasFile('cert_license_file')) {
            $filePath = $request->file('cert_license_file')->store('certificates', 'public');
            $partnerDetail->cert_license_file = $filePath;
        }

        $partner = Auth::guard('partner')->user();
        $partner->details()->save($partnerDetail);

        return redirect()->route('partner.index')->with('success', 'Partner details submitted successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate the data
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'additional_email' => 'nullable|email',
            'year_of_establishment' => 'required|integer|digits:4',
            'description' => 'nullable|string|max:1000',  // New description field
            'website_link' => 'nullable|url|max:255',  // New website link field
            'cert_license_file' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'rating' => 'nullable|numeric|between:0,5',  // Rating is optional
        ]);

        // Find the partner details to update
        $partnerDetail = PartnerDetail::findOrFail($id);

        // Update the details
        $partnerDetail->company_name = $request->company_name;
        $partnerDetail->address = $request->address;
        $partnerDetail->phone_number = $request->phone_number;
        $partnerDetail->additional_email = $request->additional_email;
        $partnerDetail->year_of_establishment = $request->year_of_establishment;
        $partnerDetail->description = $request->description;  // Update description
        $partnerDetail->website_link = $request->website_link;  // Update website link
        $partnerDetail->rating = $request->rating;

        // Handle file upload for certificate/license if provided
        if ($request->hasFile('cert_license_file')) {
            // Store the new file and update the path
            $filePath = $request->file('cert_license_file')->store('certificates', 'public');
            $partnerDetail->cert_license_file = $filePath;
        }

        // Save the updated partner details
        $partnerDetail->save();

        // Redirect back with success message
        return redirect()->route('partner.index')->with('success', 'Partner details updated successfully!');
    }
}
