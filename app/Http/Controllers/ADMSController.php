<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ADMSController extends Controller
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

    public function applicationEval($id)
    {
        $applicationData = Application::find($id);

        if ($applicationData) {
            // Fetches owner data through foreign ID
            $userData = $applicationData->user;

            return view('adms.application_eval', compact('applicationData', 'userData'));
        } else {
            return view('components.home');
        }
    }

    public function documentReview(Request $request, $id)
    {
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
        $user = Auth::user();
        $applicationData = Application::find($id);
        if ($applicationData) {
            $userData = $applicationData->user;
            return view('adms.doc_review', compact('applicationData','user'))->with('fileNameToStore_elevation_plan', $fileNameToStore_elevation_plan);
        } else {
            return redirect()->back()->with('error', 'Application not found.');
        }
    }


    // Update Compliance Status
    public function updateCompliance(Request $request, $applicationId)
    {
        $application = Application::find($applicationId);

        // Validate and update compliance status for each file/field
        $application->elevation_compliance = $request->input('elevation_compliance');
        $application->remarks_elevation = $request->input('remarks_elevation');
        // Add similar lines for other files/fields

        // Calculate overall compliance
        $overallCompliance = $this->calculateOverallCompliance($application);

        if ($overallCompliance === 'Compliant') {
            $application->status = 'ADMS Supervisor Review';
            $application->adms_evaluator = 'Checked';
        } else {
            $application->status = 'Not Compliant';
        }

        $application->save();

        return redirect()->route('adms.review', ['applicationId' => $applicationId])->with('success', 'Compliance updated successfully.');
    }

    // Helper method to calculate overall compliance
    private function calculateOverallCompliance($application)
    {
        // Implement logic to check compliance for each file/field and return 'Compliant' or 'Not Compliant'
    }
}
