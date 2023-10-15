<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\RepresentativeRequest;
use App\Models\Application;
use App\Models\Representative;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $user = auth()->user();
        if ($user->application) {
            return redirect()->back()->with('error', 'You can only submit one application per account.');
        }
        // Validate the form data (you can customize validation rules)
        $validatedData = $request->validate([
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
        // Create a new application record
        $application = new Application($validatedData);
        $application->user()->associate(auth()->user());
        $application->save();

        $representativeData = $request->only([
            'rep_fname', 'rep_lname', 'rep_company', 'rep_office_address',
            'rep_submission_date', 'rep_receipt_num', 'rep_landline', 'rep_mobile',
            'rep_email', 'rep_date_of_or'
        ]);

        // Associate the representative with the application
        $representative = new Representative($representativeData);
        $representative->application_id = $application->id;
        $representative->save();

        // Save the application with a pending status
        $application = new Application();
        $application->fill($request->all());
        $application->status = 'pending';
        $application->user()->associate($user);
        $application->save();


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

    public function showApplicationData($id)
    {
        $userApplication = Application::find($id);

        if ($userApplication) {
            return view('admin/view_application', compact('userApplication'));
        } else {
            return view('admin/application-view');
        }
    }

    public function rules()
    {
        return [
            // Validation rules...

            // Add a rule to check if the user has already submitted an application
            Rule::unique('applications')->where(function ($query) {
                return $query->where('user_id', auth()->user()->id);
            }),
        ];
    }
}
