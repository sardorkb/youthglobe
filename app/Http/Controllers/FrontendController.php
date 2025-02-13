<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Program;

class FrontendController extends Controller
{
    /**
     * Display a listing of all programs.
     *
     * @return \Illuminate\View\View
     */
    public function showPrograms(Request $request)
    {
        $programs = Program::query();

        // Apply filters or search here if needed
        if ($request->has('keyword')) {
            $programs->where('name', 'like', '%' . $request->keyword . '%');
        }

        // Sorting
        if ($request->has('sortBy')) {
            $programs->orderBy($request->sortBy);
        }

        $programs = $programs->paginate(6); // Adjust the number as needed

        return view('frontend.pages.programs', compact('programs'));
    }


    /**
     * Show a specific program with all its details.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showProgramDetails($id)
    {
        // Fetch the program with the related details (e.g., partner, etc.)
        $program = Program::with('partner', 'otherRelations')->findOrFail($id);

        return view('frontend.pages.program-details', compact('program'));
    }
    /**
     * Display a listing of the partners along with their details.
     *
     * @return \Illuminate\View\View
     */
    public function showPartners()
    {
        $partners = Partner::with('details')->paginate(6); // Adjust the number as needed
        return view('frontend.pages.partners', compact('partners'));
    }
    

    /**
     * Show a specific partner with all details.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showPartnerDetails($id)
    {
        // Fetch the partner with the related details
        $partner = Partner::with('details')->findOrFail($id);

        return view('frontend.pages.partner-details', compact('partner'));
    }

    /**
     * Show the About Us page.
     *
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }

    /**
     * Show the Contact Us page.
     *
     * @return \Illuminate\View\View
     */
    public function contactUs()
    {
        return view('frontend.pages.contact-us');
    }
}
