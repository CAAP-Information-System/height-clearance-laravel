<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\File;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function apply_owner_view()
    {
        return view('components/submit_application/owner_form');
    }

    public function submit_owner_details(Request $request)
    {
        $validateOwner = $request->validate([
            'owner_fname' => 'required|string|max:100',
            'owner_lname' => 'required|string|max:100',
            'owner_email' => 'required|string|max:100',
            'owner_address' => 'required|string|max:100',
            'owner_landline' => 'required|numeric',
            'owner_mobile' => 'nullable|numeric',
        ]);


        $ownerapplication = new Owner($validateOwner);

        $ownerapplication->save();

        return redirect()->route('upload',['application_id' => $ownerapplication->id]);
    }

    public function application_form($id)
    {
        $owner = Owner::find($id);

        // Pass the user data to the view
        return view('components/submit_application/upload_form', ['owner' => $owner]);
    }

    public function submitForm(Request $request): RedirectResponse
    {

        $user = Auth::user();
        // $applicationNumber = Application::generateApplicationNumber();
        // $user = auth()->user();
        // if ($user->application) {
        //     return redirect()->back()->with('error', 'You can only submit one application per account.');
        // }
        // Validate the form data (you can customize validation rules)
        $validateForm = $request->validate([
            'permit_type' => 'nullable|in:HCP,HL',
            'building_type' => 'nullable|in:Permanent,Temporary',
            'type_of_structure' => 'nullable|in:Residential,Commercial',
            'site_address' => 'nullable|string|max:100',
            'extension_desc' => 'nullable|string|max:300',
            'proposed_height' => 'nullable|numeric',
            'height_of_existing_structure' => 'nullable|numeric|nullable',
            'lat_deg' => 'nullable|numeric',
            'lat_min' => 'nullable|numeric',
            'lat_sec' => 'nullable|numeric',
            'long_deg' => 'nullable|numeric',
            'long_min' => 'nullable|numeric',
            'long_sec' => 'nullable|numeric',
            'orthometric_height' => 'nullable|numeric',
        ]);

        $validateFile = $request->validate([
            'elevation_plan' => 'mimes:pdf|nullable|max:10999',
            'geodetic_eng_cert' => 'mimes:pdf|nullable|max:10999',
            'control_station' => 'mimes:pdf|nullable|max:10999',
            'loc_plan' => 'mimes:pdf|nullable|max:10999',
            'comp_process_report' => 'mimes:pdf|nullable|max:10999',
            'additional_req' => 'mimes:pdf|nullable|max:10999',
        ]);

        if ($request->hasFile('elevation_plan')) {
            // Get user's ID
            $userId = auth()->user()->id;

            // Get filename with the extension
            $filenameWithExt = $request->file('elevation_plan')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('elevation_plan')->getClientOriginalExtension();

            // File to store with user's ID
            $fileNameToStore_elevation_plan = $userId . '_elevation_plan_' . time() . '.' . $extension;

            // Upload Image to the 'public' disk
            $path = $request->file('elevation_plan')->storeAs('public/elevation_plan', $fileNameToStore_elevation_plan);
        } else {
            $fileNameToStore_elevation_plan = 'Not Found';
        }
        if ($request->hasFile('geodetic_eng_cert')) {
            // Get user's ID
            $userId = auth()->user()->id;

            // Get filename with the extension
            $filenameWithExt = $request->file('geodetic_eng_cert')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('geodetic_eng_cert')->getClientOriginalExtension();

            // File to store with user's ID
            $fileNameToStore_geodetic_eng_cert = $userId . 'geodetic_eng_cert' . time() . '.' . $extension;

            // Upload Image to the 'public' disk
            $path = $request->file('geodetic_eng_cert')->storeAs('public/geodetic_eng_cert', $fileNameToStore_geodetic_eng_cert);
        } else {
            $fileNameToStore_geodetic_eng_cert = 'Not Found';
        }
        if ($request->hasFile('control_station')) {
            // Get user's ID
            $userId = auth()->user()->id;

            // Get filename with the extension
            $filenameWithExt = $request->file('control_station')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('control_station')->getClientOriginalExtension();

            // File to store with user's ID
            $fileNameToStore_control_station = $userId . 'control_station' . time() . '.' . $extension;

            // Upload Image to the 'public' disk
            $path = $request->file('control_station')->storeAs('public/control_station', $fileNameToStore_control_station);
        } else {
            $fileNameToStore_control_station = 'Not Found';
        }
        if ($request->hasFile('loc_plan')) {
            // Get user's ID
            $userId = auth()->user()->id;

            // Get filename with the extension
            $filenameWithExt = $request->file('loc_plan')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('loc_plan')->getClientOriginalExtension();

            // File to store with user's ID
            $fileNameToStore_loc_plan = $userId . 'loc_plan' . time() . '.' . $extension;

            // Upload Image to the 'public' disk
            $path = $request->file('loc_plan')->storeAs('public/loc_plan', $fileNameToStore_loc_plan);
        } else {
            $fileNameToStore_loc_plan = 'Not Found';
        }
        if ($request->hasFile('comp_process_report')) {
            // Get user's ID
            $userId = auth()->user()->id;

            // Get filename with the extension
            $filenameWithExt = $request->file('comp_process_report')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('comp_process_report')->getClientOriginalExtension();

            // File to store with user's ID
            $fileNameToStore_comp_process_report = $userId . 'comp_process_report' . time() . '.' . $extension;

            // Upload Image to the 'public' disk
            $path = $request->file('comp_process_report')->storeAs('public/comp_process_report', $fileNameToStore_comp_process_report);
        } else {
            $fileNameToStore_comp_process_report = 'Not Found';
        }
        if ($request->hasFile('additional_req')) {
            // Get user's ID
            $userId = auth()->user()->id;

            // Get filename with the extension
            $filenameWithExt = $request->file('additional_req')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('additional_req')->getClientOriginalExtension();

            // File to store with user's ID
            $fileNameToStore_additional_req = $userId . 'additional_req' . time() . '.' . $extension;

            // Upload Image to the 'public' disk
            $path = $request->file('additional_req')->storeAs('public/additional_req', $fileNameToStore_additional_req);
        } else {
            $fileNameToStore_additional_req = 'Not Found';
        }


        $application_number = Helper::IDGenerator(Application::class, 'application_number', 4, '23');

        // $request->session()->put('application', $application);

        $application = new Application($validateForm);
        $application->process_status = 'Queued for ADMS evaluation';
        $application->application_number = $application_number;
        $application->status = 'pending'; // Set the status here
        $application->user()->associate(auth()->user());
        $application->owner_id = auth()->user()->id; // Set the owner_id explicitly
        $application->permit_type = $request->input('permit_type');
        $application->save();

        $newFile = new File($validateFile);
        $newFile->elevation_plan = $fileNameToStore_elevation_plan;
        $newFile->geodetic_eng_cert = $fileNameToStore_geodetic_eng_cert;
        $newFile->control_station = $fileNameToStore_control_station;
        $newFile->loc_plan = $fileNameToStore_loc_plan;
        $newFile->comp_process_report = $fileNameToStore_comp_process_report;
        $newFile->additional_req = $fileNameToStore_additional_req;
        $newFile->status = 'Pending'; // Set the initial status
        $newFile->uploaded_by = auth()->user()->first_name; // Use the authenticated user's name
        $newFile->application()->associate($application); // Associate the file with the application
        $newFile->save();


        return redirect()->route('components.payment_receipt.create', ['application_id' => $application->id]);
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
