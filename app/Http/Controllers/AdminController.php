<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationQueue;
use App\Models\Representative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
    public function user_accountView()
    {
        $users = User::all();
        return view('admin.user_account', ['users' => $users]);
    }

    public function dashboardView()
    {
        // Gets the total count of the database tables
        $userCount = User::count();
        $applicationCount = Application::count();
        return view('admin.dashboard', compact('userCount','applicationCount'));
    }

    public function showApplicationView()
    {
        if (Auth::check() && Auth::user()->access_role === 'admin') {
            $userData = User::all();
            $applicationData = Application::all();
            return view('admin.application_tables_view')->with('applicationData', $applicationData)
            ->with('userData', $userData);
        } else {
            return redirect('/login')->with('message', 'Login as an admin to access this page.');
        }
    }


    public function applicationQueue(Request $request)
    {
        $userData = User::all();
        $applicationData = Application::all();
        $representativeData = Representative::all();
        $applicationqueue = ApplicationQueue::all();
        return view('admin.application_queue')->with('applicationData', $applicationData)
        ->with('representativeData', $representativeData)
        ->with('userData', $userData)
        ->with('applicationqueue',$applicationqueue);

    }
}
