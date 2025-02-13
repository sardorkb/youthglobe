<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Application;
use App\Models\PartnerDetail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch partner details for the currently authenticated partner
        $partnerDetails = PartnerDetail::where('partner_id', Auth::guard('partner')->id())->first();

        // If no partner details found, create a new instance or handle the case
        if (!$partnerDetails) {
            $partnerDetails = new PartnerDetail(); // Empty instance for the view to allow filling in data
        }

        // Fetch the programs created by the authenticated partner
        $programs = Program::where('partner_id', Auth::guard('partner')->id())->get();

        // Fetch applications for the partner's programs
        $applications = Application::whereIn('program_id', $programs->pluck('id'))->with('user', 'program')->get();

        // Pass partner details, programs, and applications to the view
        return view('partner.index', compact('partnerDetails', 'programs', 'applications'));
    }

    public function profile()
    {
        return view('partner.profile');
    }
}