<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ADMSStaff;
use App\Models\Aerodrome;
use App\Models\AerodromeStaff;
use App\Models\Application;
use App\Models\ApplicationQueue;
use App\Models\Staff;
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



    public function documentReview(Request $request, $application_id)
    {

        $user = Auth::user();
        $applicationData = Application::find($application_id);


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
        // Update the application data with remarks



        // Update the compliance status


        if ($applicationData) {
            $userData = $applicationData->user;

            return view(
                'adms.doc_review',
                compact('applicationData', 'user', 'fileNameToStore_elevation_plan', 'fileNameToStore_geodetic_eng_cert', 'fileNameToStore_control_station', 'fileNameToStore_loc_plan', 'fileNameToStore_comp_process_report', 'fileNameToStore_additional_req')
            )
                ->with('fileNameToStore_elevation_plan', $fileNameToStore_elevation_plan)
                ->with('fileNameToStore_geodetic_eng_cert', $fileNameToStore_geodetic_eng_cert)
                ->with('fileNameToStore_control_station', $fileNameToStore_control_station)
                ->with('fileNameToStore_loc_plan', $fileNameToStore_loc_plan)
                ->with('fileNameToStore_comp_process_report', $fileNameToStore_comp_process_report)
                ->with('fileNameToStore_additional_req', $fileNameToStore_additional_req);
        } else {
            return redirect()->back()->with('error', 'Application not found.');
        }
    }

    public function updateCompliance(Request $request, $id)
    {
        $user = Auth::user();
        $applicationData = Application::find($id);

        $request->validate([
            'evaluation_status' => 'nullable|string|max:255',
            'application_info_remarks' => 'nullable|string|max:255',
            'elev_plan_remarks' => 'string|max:255',
            'geodetic_eng_remarks' => 'string|max:255',
            'control_station_remarks' => 'string|max:255',
            'loc_plan_remarks' => 'string|max:255',
            'comp_process_report_remarks' => 'string|max:255',
            'additional_req_remarks' => 'string|max:255',
            'doc_compliance_result' => 'nullable|string|max:255',
            'crit_area_result' => 'nullable|string|max:255',

            'app_comp' => 'required|in:Complied,NotComplied',
            'fee_comp' => 'required|in:Complied,NotComplied',
            'ep_comp' => 'required|in:Complied,NotComplied',
            'ge_comp' => 'required|in:Complied,NotComplied',
            'cs_comp' => 'required|in:Complied,NotComplied',
            'lp_comp' => 'required|in:Complied,NotComplied',
            'cp_comp' => 'required|in:Complied,NotComplied',
            'ar_comp' => 'required|in:Complied,NotComplied',
        ]);

        if ($request->isMethod('post')) {
            // Handle the POST request to update compliance

            // Get and update the application data with remarks
            $staff = new Aerodrome();
            $staff->elev_plan_remarks = $request->input('elev_plan_remarks');
            $staff->geodetic_eng_remarks = $request->input('geodetic_eng_remarks');
            $staff->control_station_remarks = $request->input('control_station_remarks');
            $staff->loc_plan_remarks = $request->input('loc_plan_remarks');
            $staff->comp_process_report_remarks = $request->input('comp_process_report_remarks');
            $staff->additional_req_remarks = $request->input('additional_req_remarks');
            $staff->fee_comp = $request->input('app_comp');
            $staff->fee_comp = $request->input('fee_comp');
            $staff->ep_comp = $request->input('ep_comp');
            $staff->ge_comp = $request->input('ge_comp');
            $staff->cs_comp = $request->input('cs_comp');
            $staff->lp_comp = $request->input('lp_comp');
            $staff->cp_comp = $request->input('cp_comp');
            $staff->ar_comp = $request->input('ar_comp');

            $doc_compliance_result = $request->input('doc_compliance_result');

            // Save the updated application data
            $staff->user_id = $id;
            $staff->doc_compliance_result = $doc_compliance_result;
            $staff->save();




            return redirect()->route('adms.critical_eval', ['id' => $user->id]);
        } else {
            // Handle the GET request to display the form or perform other actions

            // You can add code here to load the form or perform other GET actions
        }
    }

    public function viewcriticalEvaluation($id)
    {
        $user = Auth::user();
        $applicationData = Application::find($id);

        if ($applicationData) {
            // Fetches owner data through foreign ID
            $userData = $applicationData->user;

            return view('adms.critical_eval', compact('applicationData', 'userData', 'user'));
        } else {
            return view('components.home');
        }
    }

    public function updateCriticalEvaluation(Request $request, $id)
    {
        $user = Auth::user();
        $applicationData = Application::find($id);
        // Find the Staff record for the user
        $critical_eval = Aerodrome::where('user_id', $id)->first();


        $request->validate([
            'crit_area_result' => 'nullable|string|max:255',
        ]);

        $userChoice = $request->input('crit_area_result');

        // Update the crit_area_result field
        $critical_eval->crit_area_result = $userChoice;
        $critical_eval->save();

        return redirect()->route('adms.height_eval', ['id' => $user->id]);
    }

    public function viewHeightEvaluation(Request $request, $id)
    {
        $user = Auth::user();
        $applicationData = Application::find($id);


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


        if ($applicationData) {
            $userData = $applicationData->user;

            return view(
                'adms.height_eval',
                compact('applicationData', 'user')
            )
                ->with('fileNameToStore_elevation_plan', $fileNameToStore_elevation_plan)
                ->with('fileNameToStore_geodetic_eng_cert', $fileNameToStore_geodetic_eng_cert)
                ->with('fileNameToStore_loc_plan', $fileNameToStore_loc_plan);
        } else {
            return redirect()->back()->with('error', 'Application not found.');
        }
    }

    public function updateHeightEvaluation(Request $request, $id)
    {
        $user = Auth::user();
        $applicationData = Application::find($id);
        $staff = Aerodrome::where('user_id', $id)->first();
        $request->validate([
            'evaluation_status' => 'nullable|string|max:255',

        ]);


        $evaluation_status = $request->input('evaluation_status');

        // Save the updated application data
        $staff->evaluation_status = $evaluation_status;
        $staff->save();

        return redirect()->route('ADMSSupervisorView', ['id' => $user->id]);
    }

    public function ADMSSupervisorView(Request $request, $id)
    {
        $user = Auth::user();
        $applicationData = Application::find($id);


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


        if ($applicationData) {
            $userData = $applicationData->user;

            return view(
                'adms.supervisor_eval',
                compact('applicationData', 'user')
            )
                ->with('fileNameToStore_elevation_plan', $fileNameToStore_elevation_plan)
                ->with('fileNameToStore_geodetic_eng_cert', $fileNameToStore_geodetic_eng_cert)
                ->with('fileNameToStore_loc_plan', $fileNameToStore_loc_plan);
        } else {
            return redirect()->back()->with('error', 'Application not found.');
        }
    }

    public function ADMSSupervisorUpdate(Request $request, $id)
    {
        $user = Auth::user();
        $applicationData = Application::find($id);


        // Updates the process status that the application is finished being evaluted.
        $queue_status = new ApplicationQueue();
        $queue_status->user_id = $id;
        $queue_status->queue_id = 1; // Set an appropriate default value
        $queue_status->adms_eval = 'Evaluated';
        $queue_status->adms_supervisor = 'Checked';
        $queue_status->adms_chief = 'For Review';
        $queue_status->save();

        return redirect()->route('success', ['id' => $user->id]);
    }
}
