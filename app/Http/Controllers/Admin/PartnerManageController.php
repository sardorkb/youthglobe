<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner; // Import the Partner model
use App\Models\PartnerDetail; // Import the PartnerDetail model
use Illuminate\Http\Request;

class PartnerManageController extends Controller
{
    // View all partners
    public function index()
    {
        $partners = PartnerDetail::with('partner')->get();
        return view('admin.partners.index', compact('partners'));
    }

    // View partners pending approval
    public function approval()
    {
        $pendingPartners = Partner::with('details')->where('status', 'pending')->get(); // Fetch pending partners based on partner status
        return view('admin.partners.index', compact('pendingPartners'));
    }

    // Approve a partner
    public function approve($id)
    {
        $partner = Partner::findOrFail($id); // Find partner by ID
        $partner->status = 'active'; // Change status to 'active'
        $partner->save(); // Save the updated status

        // Redirect back to the previous page (staying on the same partner show page)
        return back()->with('success', 'Partner approved successfully.');
    }

    // Reject a partner
    public function reject($id)
    {
        $partner = Partner::findOrFail($id); // Find partner by ID
        $partner->delete(); // Delete the partner

        // Redirect back to the previous page (staying on the same partner show page)
        return back()->with('success', 'Partner rejected and removed.');
    }

    // Show a partner with details
    public function show($id)
    {
        $partnerDetail = PartnerDetail::with('partner')->findOrFail($id); // Fetch partner with related details
        return view('admin.partners.show', compact('partnerDetail'));
    }
}
