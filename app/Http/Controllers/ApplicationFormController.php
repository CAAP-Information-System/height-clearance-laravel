<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\RepresentativeRequest;
use App\Models\Application;
use App\Models\Representative;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationFormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('components/upload_form');
    }

    public function submitForm(Request $request): RedirectResponse
    {
        // Validate the form data (you can customize validation rules)
        $request->validate([
            'fname' => 'required|string|max:100',
            'lname' => 'required|string|max:100',
            'email' => 'required|string|max:50',
            'landline' => 'required|numeric',
            'owner_address' => 'required|string|max:255',
            'mobile' => 'required|numeric',
            'type_of_structure' => 'required|string|max:100',
            'site_address' => 'required|string|max:100',
            'proposed_height' => 'required|numeric',
            'height_of_existing_structure' => 'required|numeric',
            'permit_type' => 'required|in:height_clearance_permit,height_limitation',
            'rep_fname' => 'required|string|max:255',
            'rep_lname' => 'required|string|max:255',
            'rep_company' => 'required|string|max:255',
            'rep_office_address' => 'required|string|max:255',
            'rep_submission_date' => 'required|date',
            'rep_receipt_num' => 'required|string|max:255',
            'rep_mobile' => 'required|integer',
            'rep_landline' => 'required|integer',
            'rep_email' => 'required|email|max:255',
            'rep_date_of_or' => 'required|date',
        ]);

        // Create a new application record
        Representative::create($request->all());
        Application::create($request->all());

        return redirect()->back()->with('success', 'Application submitted successfully.');
    }

    public function getFormData($id)
    {
        $formData = Application::find($id);

        if (!$formData) {
            return response()->json(['error' => 'Form data not found'], 404);
        }

        return response()->json(['data' => $formData], 200);
    }
}
