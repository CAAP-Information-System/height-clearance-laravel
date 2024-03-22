<?php

namespace App\Http\Controllers;

use App\Models\ADMSStaff;
use App\Models\Aerodrome;
use App\Models\AerodromeStaff;
use App\Models\Airtraffic;
use App\Models\Application;
use App\Models\ApplicationQueue;
use App\Models\File;
use App\Models\Owner;
use App\Models\Receipt;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ANSController extends Controller
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


    public function showHeightEvaluation(Request $request, $id)
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
            $aerodrome = Aerodrome::find($id);
            $userData = $applicationData->owner;
            $files = File::where('application_id', $applicationData->id)->first();
            $receipt = Receipt::where('application_id', $applicationData->id)->first();

            return view(
                'ans.evaluator.evaluation-form',
                compact('applicationData', 'user', 'userData', 'airports', 'files', 'receipt', 'aerodrome')
            )
                ->with('fileNameToStore_elevation_plan', $fileNameToStore_elevation_plan)
                ->with('fileNameToStore_geodetic_eng_cert', $fileNameToStore_geodetic_eng_cert)
                ->with('fileNameToStore_loc_plan', $fileNameToStore_loc_plan);
        } else {
            return redirect()->back()->with('error', 'Application not found.');
        }
    }
    public function ANSEvalUpdate(Request $request, $id)
    {
        $user = Auth::user();
        $aerodrome = Aerodrome::findOrFail($id);
        $airtraffic = new Airtraffic();

        $request->validate([
            'eval_result' => 'nullable|in:Approved,Denied',

        ]);

        $airtraffic->user_id = $aerodrome->user_id;
        $airtraffic->application_id = $aerodrome->application_id;
        $airtraffic->evaluation_status = $aerodrome->evaluation_status;
        $airtraffic->doc_compliance_result = $aerodrome->doc_compliance_result;
        $airtraffic->crit_area_result = $aerodrome->crit_area_result;
        $airtraffic->reference_aerodrome = $aerodrome->reference_aerodrome;
        $airtraffic->max_allowed_top_elev = $aerodrome->max_allowed_top_elev;
        $airtraffic->height_eval_remarks = $aerodrome->height_eval_remarks;
        $airtraffic->proposed_top_elev = $aerodrome->proposed_top_elev;

        $airtraffic->save();
        // Check if the ApplicationQueue record exists
        $queue_status = ApplicationQueue::where('user_id', $id)->first();

        if (!$queue_status) {
            // If the record doesn't exist, you may choose to handle it accordingly
            return redirect()->route('home')->with('error', 'ApplicationQueue record not found.');
        }

        // Updates the process status that the application is finished being evaluated.
        $queue_status->ans_eval = 'Evaluated';
        $queue_status->ans_supervisor = 'For Review';
        $queue_status->save();

        return redirect()->route('ANStoSupervisor', ['id' => $user->id]);
    }

    public function proceedToSupervisor()
    {
        return view('ans.proceed_message.proceed_to_supervisor',);
    }

    public function ANSSupervisor(Request $request, $id)
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
            $aerodrome = Aerodrome::find($id);
            $userData = $applicationData->owner;
            $files = File::where('application_id', $applicationData->id)->first();
            $receipt = Receipt::where('application_id', $applicationData->id)->first();

            return view(
                'ans.supervisor.evaluation-form',
                compact('applicationData', 'user', 'userData', 'airports', 'files', 'receipt', 'aerodrome')
            )
                ->with('fileNameToStore_elevation_plan', $fileNameToStore_elevation_plan)
                ->with('fileNameToStore_geodetic_eng_cert', $fileNameToStore_geodetic_eng_cert)
                ->with('fileNameToStore_loc_plan', $fileNameToStore_loc_plan);
        } else {
            return redirect()->back()->with('error', 'Application not found.');
        }
    }
    public function ANSSupervisorUpdate(Request $request, $id)
    {
        $user = Auth::user();
        $airtraffic = Airtraffic::findOrFail($id);

        // Validate the incoming request data if needed
        $validatedData = $request->validate([
            'max_allowed_top_elev' => 'numeric',
            'retain_height_eval_remarks' => 'string',
            'reference_aerodrome' => 'string',

            // Add validation rules for other fields if needed
        ]);

        $airtraffic->update($validatedData);
        // Check if the ApplicationQueue record exists
        $queue_status = ApplicationQueue::where('user_id', $id)->first();

        if (!$queue_status) {
            // If the record doesn't exist, you may choose to handle it accordingly
            return redirect()->route('home')->with('error', 'ApplicationQueue record not found.');
        }

        // Updates the process status that the application is finished being evaluated.
        $queue_status->ans_supervisor = 'Checked';
        $queue_status->ans_chief = 'For Review';
        $queue_status->save();

        return redirect()->route('ANStoChief', ['id' => $user->id]);
    }
    public function proceedToChief()
    {
        return view('ans.proceed_message.proceed_to_chief',);
    }
    public function ANSChiefView(Request $request, $id)
    {
        $user = Auth::user();
        $applicationData = Application::findOrFail($id);
        $aerodrome = Aerodrome::find($id);

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
        $userData = $applicationData->owner;

        $files = File::where('application_id', $applicationData->id)->first();
        $receipt = Receipt::where('application_id', $applicationData->id)->first();

        return view(
            'ans.chief.approval',
            compact('applicationData', 'user', 'userData', 'files', 'receipt', 'aerodrome')
        )
            ->with('fileNameToStore_elevation_plan', $fileNameToStore_elevation_plan)
            ->with('fileNameToStore_geodetic_eng_cert', $fileNameToStore_geodetic_eng_cert)
            ->with('fileNameToStore_loc_plan', $fileNameToStore_loc_plan);
    }

    public function ANSChiefUpdate(Request $request, $id)
    {
        $user = Auth::user();

        // Retrieve the Application model instance
        $applicationStatus = Application::where('user_id', $id)->first();

        // Check if the Application record exists
        if (!$applicationStatus) {
            // If the record doesn't exist, you may choose to handle it accordingly
            return redirect()->route('home')->with('error', 'Application record not found.');
        }

        // Retrieve the ApplicationQueue record
        $queue_status = ApplicationQueue::where('user_id', $id)->first();

        if (!$queue_status) {
            // If the record doesn't exist, you may choose to handle it accordingly
            return redirect()->route('home')->with('error', 'ApplicationQueue record not found.');
        }

        // Updates the process status that the application is finished being evaluated.
        $queue_status->ans_chief = 'Noted';
        $queue_status->save();

        $applicationStatus->process_status = "Recommended draft for final review and endorsement to ODG";
        $applicationStatus->save();

        return redirect()->route('home', ['id' => $user->id]);
    }
}
