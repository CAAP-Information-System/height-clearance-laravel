<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
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
            'mobile' => 'required|numeric',
            'type_of_structure' => 'required|string|max:100',
            'site_address' => 'required|string|max:100',
            'proposed_height' => 'required|numeric',
            'height_of_existing_structure' => 'required|numeric',
            // Add other fields with appropriate validation rules
        ]);

        // Create a new application record
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
