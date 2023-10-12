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
    public function index()
    {
        $users = User::all();
        return view('admin.index', ['users' => $users]);
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
