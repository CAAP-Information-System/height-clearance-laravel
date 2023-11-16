<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ADMSStaff;
use App\Models\Aerodrome;
use App\Models\AerodromeStaff;
use App\Models\Application;
use App\Models\ApplicationQueue;
use App\Models\File;
use App\Models\Owner;
use App\Models\Receipt;
use App\Models\Staff;
use App\Models\User;
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


    public function queuedApplicants()
    {

        if (Auth::check() && Auth::user()->access_role === 'adms') {
            $userData = User::all();
            $applicationData = Application::all();
            return view('adms.queue')->with('applicationData', $applicationData)
                ->with('userData', $userData);
        } else {
            return redirect('/login')->with('message', 'Login as an admin to access this page.');
        }
    }

    public function documentReview(Request $request, $id)
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


        if ($applicationData) {
            $isComplied = true; // Add logic to check compliance based on your requirements
            $userData = $applicationData->owner;
            $files = File::where('application_id', $applicationData->id)->first();
            $receipt = Receipt::where('application_id', $applicationData->id)->first();

            if (!$isComplied) {
                // If not complied, inform the user
                return view('components/home')->with('error', 'Your application is not compliant. Please resubmit.');
            }

            return view(
                'adms/doc_review',
                compact('applicationData', 'user', 'userData', 'files', 'receipt')
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
            'elev_plan_remarks' => 'nullable|string|max:255',
            'geodetic_eng_remarks' => 'nullable|string|max:255',
            'control_station_remarks' => 'nullable|string|max:255',
            'loc_plan_remarks' => 'nullable|string|max:255',
            'comp_process_report_remarks' => 'nullable|string|max:255',
            'additional_req_remarks' => 'nullable|string|max:255',
            'doc_compliance_result' => 'nullable|string|max:255',
            'crit_area_result' => 'nullable|string|max:255',

            'app_comp' => 'nullable|string',
            'fee_comp' => 'nullable|string',
            'ep_comp' => 'nullable|string',
            'ge_comp' => 'nullable|string',
            'cs_comp' => 'nullable|string',
            'lp_comp' => 'nullable|string',
            'cp_comp' => 'nullable|string',
            'ar_comp' => 'nullable|string',
        ]);

        if ($request->isMethod('post')) {
            // Retrieve the existing Aerodrome record associated with the Application and the provided $id
            $aerodrome = Aerodrome::where('user_id', $user->id) // Change to $id
                ->where('application_id', $id)
                ->first();
            // If no existing Aerodrome record is found, create a new one
            if (!$aerodrome) {
                $aerodrome = new Aerodrome();
                $aerodrome->user_id = $user->id;
                $aerodrome->application_id = $id;
            }


            // Update Aerodrome attributes
            $aerodrome->elev_plan_remarks = $request->input('elev_plan_remarks');
            $aerodrome->geodetic_eng_remarks = $request->input('geodetic_eng_remarks');
            $aerodrome->control_station_remarks = $request->input('control_station_remarks');
            $aerodrome->loc_plan_remarks = $request->input('loc_plan_remarks');
            $aerodrome->comp_process_report_remarks = $request->input('comp_process_report_remarks');
            $aerodrome->additional_req_remarks = $request->input('additional_req_remarks');
            $aerodrome->fee_comp = $request->input('app_comp');
            $aerodrome->fee_comp = $request->input('fee_comp');
            $aerodrome->ep_comp = $request->input('ep_comp');
            $aerodrome->ge_comp = $request->input('ge_comp');
            $aerodrome->cs_comp = $request->input('cs_comp');
            $aerodrome->lp_comp = $request->input('lp_comp');
            $aerodrome->cp_comp = $request->input('cp_comp');
            $aerodrome->ar_comp = $request->input('ar_comp');
            $aerodrome->doc_compliance_result = $request->input('doc_compliance_result');
            $aerodrome->application_id = $id;
            // Save the updated or new Aerodrome record
            $aerodrome->save();

            // Update Application attributes
            $applicationData->is_ForEval = ($request->input('doc_compliance_result') === 'Complied') ? 0 : 2;
            $applicationData->save();

            // Check if the compliance result is "Not Complied"
            if ($request->input('doc_compliance_result') === 'Not Complied') {
                return redirect()->route('home'); // Redirect to home if not complied
            } else {
                return redirect()->route('adms.critical_eval', ['id' => $applicationData->id]); // Continue to critical eval if complied
            }
        } else {
            // Handle other cases if needed
        }
    }

    public function viewcriticalEvaluation($id)
    {
        $user = Auth::user();
        $applicationData = Application::find($id);

        if ($applicationData) {
            // Fetches owner data through foreign ID
            $userData = $applicationData->owner;
            $files = File::where('application_id', $applicationData->id)->first();
            $receipt = Receipt::where('application_id', $applicationData->id)->first();
            return view('adms.critical_eval', compact('applicationData', 'userData', 'user', 'files', 'receipt'));
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
        // Redirect based on the value of crit_area_result
        if ($userChoice === 'Outside') {
            return redirect()->route('home');
        } elseif ($userChoice === 'Within') {
            return redirect()->route('adms.height_eval', ['id' => $user->id]);
        } else {
            // Handle other cases if needed
            return redirect()->back()->with('error', 'Invalid choice.');
        }
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
        $airports = [
            "ACME (Maconacon Isabela) Airstrip",
            "Alabat Community Airport (ACA)",
            "Allah Valley Community Airport (AVCA)",
            "Alta Vista Agri-Ventures Airstrip",
            "AMSFC (Kapalong) Airstrip",
            "AMSFC (Magatos) Airstrip",
            "ANFLO BANANA CORPORATION Airstrip",
            "Antique Principal Airport (APA)",
            "Apurauan Airstrip",
            "Bacolod Principal Airport (BPA)",
            "Bacon Community Airport (BCA)",
            "Bagabag Community Airport (BCA)",
            "Baguio Principal Airport (BPA)",
            "Baler Community Airport (BCA)",
            "Balesin Airstrip",
            "Bantayan Community Airport (BCA)",
            "Basa Air Base (BAB)",
            "Basco Principal Airport (BPA)",
            "Berong Aerodrome",
            "Bicol Airport (BA)",
            "Bienvenida Airstrip",
            "Biliran Community Airport (BCA)",
            "Binalonan Airstrip",
            "Bislig Community Airport (BCA)",
            "Bohol-Panglao Principal Airport (BPPA)",
            "Borongan Community Airport (BCA)",
            "Buayan Airport",
            "Buksuk Airstrip",
            "Bulan Community Airport (BCA)",
            "Butuan Principal Airport (BPA)",
            "Cagayan Community Airport (CCA)",
            "Cagayan de Oro Military Airport (CDOMA)",
            "Calapan Community Airport (CCA)",
            "Calatagan Hacienda Bigaa Airstrip",
            "Calbayog Principal Airport (CPA)",
            "Camiguin Principal Airport (CPA)",
            "Camotes Airstrip",
            "Camp Capinpin Airstrip (CCA)",
            "Camp Capinpin Military Airport (CCMA)",
            "Catarman Principal Airport (CPA)",
            "Catbalogan Community Airport (CCA)",
            "Cauayan Principal Airport (CPA)",
            "ComVal Tropical Fruits, Inc. Airstrip",
            "Corregidor Airstrip",
            "Cotabato Principal Airport (CPA)",
            "Culion Airport",
            "Cuyo Principal Airport (CPA)",
            "Dacudao Airstrip",
            "Daet Community Airport (DCA)",
            "Daniel Z. Romualdez Principal Airport (DZRPA)",
            "Dapco Airstrip",
            "Del Monte Airstrip",
            "Delta Farms Aerodrome",
            "Dilasag Pateco (Aurora) Airstrip",
            "Dinapigue Airstrip",
            "Diosdado Macapagal International Airport (DMIA)",
            "Dipolog Principal Airport (DPA)",
            "Dolefil Airstrip",
            "Don Jesus Soriano Airstrip",
            "Dumaguete Principal Airport (DPA)",
            "Emilio Aguinaldo Airstrip",
            "Evergreen Farms Airstrip",
            "Farmingtown Airstrip",
            "Fernando Air Base (FAB)",
            "Filminera Amoroy Airstrip",
            "Fort Magsaysay Airstrip",
            "Fort Magsaysay Military Airport",
            "Francisco B. Reyes Principal Airport (FBRPA)",
            "Francisco Bangoy International Airport (FBIA)",
            "FS Dizon & Sons, Inc. (Antiquera) Airstrip",
            "FS Dizon & Sons, Inc. (Mawab) Airstrip",
            "Gadeco-Guihing Airstrip",
            "Godofredo P. Ramos Principal Airport (GPRPA)",
            "Guimaras Airstrip",
            "Guiuan Community Airport (GCA)",
            "Hermana Mayor (Zambales) Airstrip",
            "Hermana Menor (Zambales) Airstrip",
            "Herminio Teves & Company Inc. Airstrip",
            "Hijo Plantation Airstrip",
            "Hilongos Community Airport (HCA)",
            "Iba Community Airport (ICA)",
            "Iligan Community Airport (ICA)",
            "Iloilo International Airport (IIA)",
            "Ipil Community Airport (ICA)",
            "Itbayat Community Airport (ICA)",
            "Jesus Magsaysay Airstrip",
            "Jolo Principal Airport (JPA)",
            "Jomalig Community Airport (JCA)",
            "Kabankalan Airport",
            "Kalibo International Airport (KIA)",
            "Kling Plantation Airstrip",
            "La Filipina Airstrip",
            "La Frutera Airstrip",
            "LADECO-Lapanday Airstrip",
            "LADECO-Maryland Airstrip",
            "Laguindingan Principal Airport (LPA)",
            "Lallo Principal Airport (LPA)",
            "Laoag International Airport (LIA)",
            "Legazpi Principal Airport (LPA)",
            "Lepanto Airstrip",
            "Liloy Community Airport (LCA)",
            "Lingayen Community Airport (LCA)",
            "Lubang Community Airport (LCA)",
            "Lunga-og Airstrip",
            "M'lang Airport",
            "M&S Company Airstrip",
            "Maasin Community Airport (MCA)",
            "Mabag Airstrip",
            "Macgum Airstrip",
            "Mactan-Cebu International Airport (MCIA)",
            "Sangley Principal Airport (SPA)",
            "Malabang Community Airport (MCA)",
            "Malalag Airstrip",
            "Malita Airstrip",
            "Mamburao Community Airport (MCA)",
            "Mannie W. Barradas Airstrip",
            "Maragusan Airstrip",
            "Marinduque Principal Airport (MPA)",
            "Marsman Estate Airstrip",
            "Masbate Principal Airport (MPA)",
            "Mati Community Airport (MCA)",
            "MD New Corella Agri-Ventures Airstrip",
            "MD Panabo Agri Ventures, Inc Airstrip",
            "MDRVAVI Airstrip",
            "Mt. Kitanglad Agri Development Corp Airstrip",
            "Naga Principal Airport (NPA)",
            "NEDA (Bo. NEDA) Airstrip",
            "Ninoy Aquino International Airport (NAIA)",
            "Nonoc Mining Airstrip",
            "Nova Vista Management & Development",
            "OADI Airstrip",
            "Omni (Tarlac) Airstrip",
            "Omni Aviation Corporation – Airstrip",
            "Ormoc Principal Airport (OPA)",
            "Ozamiz Principal Airport (OPA)",
            "Pacific Air-Val- Coron Airstrip",
            "Pagadian Principal Airport (PPA)",
            "San Vicente Principal Airport",
            "Palanan Community Airport (PCA)",
            "Pamalican II Airstrip",
            "Pasar Airstrip",
            "PICOP Airstrip",
            "Pinamalayan Community Airport (PCA)",
            "Plaridel Community Airport (PCA)",
            "Puerto Princesa International Airport (PPIA)",
            "Refugio Airstrip",
            "Rio Tuba Airstrip",
            "Romblon Principal Airport (RPA)",
            "Rosales Community Airport (RCA)",
            "Roxas Municipal Airstrip",
            "Roxas Principal Airport (RPA)",
            "San Fernando  Community Airport (SFCA)",
            "San Isidro Ranch Airstrip",
            "San Jose Principal Airport (SJPA)",
            "SAN VICENTE AIRPORT",
            "San Vicente Principal Airport (SVPA)",
            "Sandoval Airstrip",
            "Sanga-sanga Principal Airport (SPA)",
            "Sangley Principal Airport (SPA)",
            "SEMIRARA (Vulcan)",
            "Siargao Principal Airport (SPA)",
            "Siocon Community Airport (SCA)",
            "Sipalay Airstrip",
            "Siquijor Community Airport (SCA)",
            "Sirawai Airstrip",
            "Sodaco Airstrip",
            "Subic Bay Principal Airport (SBPA)",
            "Surigao Principal Airport (SPA)",
            "TADECO I Airstrip",
            "TADECO II Airstrip",
            "Tambler Principal Airport (TPA)",
            "Tampakan Airstrip",
            "Tandag Principal Airport (TPA)",
            "Tapian Airstrip",
            "Tarumpitao Airstrip",
            "Ten Knots (TKDC) Airstrip",
            "Tuguegarao Principal Airport (TPA)",
            "Ubay Community Airport (UCA)",
            "Vigan Community Airport (VCA)",
            "Virac Principal Airport (VPA)",
            "Wao Airport",
            "Wasig Community Airport (WCA)",
            "Western Agri Ventures Corp. Airstrip",
            "Woodland Airpark Airstrip",
            "Zamboanga Principal Airport (ZPA)",
            "Bacong Airport (BA)",
            "Zamboanga-Mercedes Airport",
            "New Siargao Airport",
            "Bulacan (San Miguel) Airport",
            "Casiguran Airport",
            "Bukidnon (Maraymaray) Airport",
            "Lallo Pincipal Airport (LPA)",
            "San Vicente Naval Airstrip (SVNA)",
            "Calayan Airport (CA)",
        ];



        if ($applicationData) {
            $userData = $applicationData->owner;
            $files = File::where('application_id', $applicationData->id)->first();
            $receipt = Receipt::where('application_id', $applicationData->id)->first();
            return view(
                'adms.height_eval',
                compact('applicationData', 'user', 'userData','airports','files', 'receipt')
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
