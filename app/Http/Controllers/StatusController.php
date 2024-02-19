<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function applicationStatus($application_id)
    {
        $applicationData = Application::find($application_id);

        if ($applicationData) {
            // Assuming there's a user associated with the application
            $userData = $applicationData->user;

            return view('components.status.application_status', compact('applicationData', 'userData'));
        } else {
            return view('components.home');
        }
    }

    public function checkStatus(Request $request)
    {
        // Retrieve the user's application if authenticated
        $user = $request->user();
        $application = $user->application;


        if ($application) {
            return view('components.status.view_status', ['application' => $application]);
        } else {
            // Handle the case where no application is found
            return view('components.home');
        }
    }

    public function updateStatus(Request $request, $application_id)
    {
        $application = Application::find($application_id);
        if (!$application) {
            // Handle if the application is not found
        }

        $application->status = 'Under ADMS Evaluation';
        $application->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function successPage()
    {

        return view('adms/success_page');
    }

    public function checkResultsPage()
    {
        return view('components/results/check_results');
    }

    public function checkSubmission(Request $request, $id)
    {
        $applicationData = Application::with('aerodrome')->find($id);

        // 0 == file is under evaluation/processing
        if ($applicationData->is_ForEval == "0") {
            return view('message_template/check_results');
        }
        // 1 == file has been successfully evaluated/processed
        else if ($applicationData->is_ForEval == "1") {
            return view('message_template/success_application');
        }
        // 2 == file has been rejected or for resubmission
        else {
            return view('message_template/failed_application',compact('applicationData'));
        }
    }

    public function showApplications()
{
    // Get the authenticated user
    $user = auth()->user();

    // Retrieve applications sent by the user
    $applications = Application::with('owner')->where('user_id', $user->id)->get();


    return view('components.status.view_status', compact('applications'));
}
}
