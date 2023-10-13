<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
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
            $applicationData = Application::all();

            $representativeData = Representative::all();
            return view('admin.application_tables_view')->with('applicationData', $applicationData)->with('representativeData', $representativeData);;
        } else {
            return redirect('/login')->with('message', 'Login as an admin to access this page.');
        }
    }
}
