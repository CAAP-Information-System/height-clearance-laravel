<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\RepresentativeRequest;
use App\Models\Application;
use App\Models\Representative;
use App\Models\User;
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

        // $applicationNumber = Application::generateApplicationNumber();

        $user = auth()->user();
        // if ($user->application) {
        //     return redirect()->back()->with('error', 'You can only submit one application per account.');
        // }
        // Validate the form data (you can customize validation rules)
        $validatedData = $request->validate([
            'permit_type' => 'required|in:height_clearance_permit,height_limitation',
            'type_of_structure' => 'required|in:Residential,Commercial',
            'site_address' => 'required|string|max:100',
            'proposed_height' => 'required|numeric',
            'height_of_existing_structure' => 'required|numeric',
            'lat_deg' => 'required|numeric',
            'lat_min' => 'required|numeric',
            'lat_sec' => 'required|numeric',
            'long_deg' => 'required|numeric',
            'long_min' => 'required|numeric',
            'long_sec' => 'required|numeric',
            'orthometric_height' => 'required|numeric',
            'submission_date' => 'required|date',
            'receipt_num' => 'required|string|max:255',
            'date_of_or' => 'required|date',
            'images' => 'mimes:pdf|nullable|max:10999'

        ]);


        if ($request->hasFile('images')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('images')->getClientOriginalExtension();
            // File to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image to the 'public' disk
            $path = $request->file('images')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'Not Found';
        }

        $application_number = Helper::IDGenerator(Application::class, 'application_number', 4, '23');


        $application = new Application($validatedData);
        $application->images = $fileNameToStore;
        $application->application_number = $application_number;
        $application->process_status = 'Queued for ADMS evaluation';
        $application->status = 'pending'; // Set the status here
        $application->user()->associate(auth()->user());
        $application->save();


        return redirect()->back()->with('success', 'Application submitted successfully.');
    }

    public function applicationStatus()
    {
        $applicationData = Application::all();

        return view('components.application_status')->with('applicationData', $applicationData);
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::find($id);
        if (!$application) {
            // Handle if the application is not found
        }

        $application->status = 'Under ADMS Evaluation';
        $application->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
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
        $applicationData = Application::find($id);

        if ($applicationData) {
            // Assuming there's a user associated with the application
            $userData = $applicationData->user;

            return view('admin.view_application', compact('applicationData', 'userData'));
        } else {
            return view('admin.application-view');
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
