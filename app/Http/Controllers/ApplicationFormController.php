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
            'permit_type' => 'required|in:height_clearance_permit,height_limitation',
            'type_of_structure' => 'required|string|max:100',
            'site_address' => 'required|string|max:100',
            'proposed_height' => 'required|numeric',
            'height_of_existing_structure' => 'required|numeric',
            'submission_date' => 'required|date',
            'receipt_num' => 'required|string|max:255',
            'date_of_or' => 'required|date',
            // 'images' => 'required|mimes:pdf|max:2048',

        ]);


        // Specify the directories and filenames
        if ($request->hasFile('images')) {
            $fileNameToStore = 'yes';
            // // Get filename with the extension
            // $filenameWithExt = $request->file('images')->getClientOriginalName();
            // //Get just filename
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // //Get just ext
            // $extension = $request->file('images')->getClientOriginalExtension();
            // //file to store
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // //Upload Image
            // $path = $request->file('images')->storeAs('public/images/', $fileNameToStore);
        } else {
            $fileNameToStore = 'NO';
        }

        // Create a new application record
        $application = new Application($validatedData);
        $application->images = $fileNameToStore;
        $application->user()->associate(auth()->user());
        $application->save();


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

    public function testFileUpload(Request $request){
        // Validate the form data (you can customize validation rules)


    }
}
