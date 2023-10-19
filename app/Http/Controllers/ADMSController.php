<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

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

    public function criticalAreaEval($id)
    {
        $applicationData = Application::find($id);

        if ($applicationData) {
            // Fetches owner data through foreign ID
            $userData = $applicationData->user;

            return view('adms.adms_critical_eval', compact('applicationData', 'userData'));
        } else {
            return view('components.home');
        }
    }

    public function viewDocumentaryCompliance($id)
    {
        $applicationData = Application::find($id);

        if ($applicationData) {
            $userData = $applicationData->user;
            return view('adms.adms_doc_compliance', compact('applicationData'));
        } else {
            return redirect()->back()->with('error', 'Application not found.');
        }
    }


    //  public function evalRemarks(Request $request, $id)
    //  {

    //     $validatedData = $request->validate([
    //         'remarks' => 'nullable|string|max:255'

    //     ]);

    //     $evaluation = new Application($validatedData);
    //     $evaluation->user()->associate(auth()->user());
    //     $evaluation->save();

    //     return redirect()->back()->with('success', 'Application submitted successfully.');

    //  }
}
