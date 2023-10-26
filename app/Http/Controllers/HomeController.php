<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function showHome()
    {
        return view('components/home');
    }

    public function uploadFile()
    {

        return view('components/upload_file');
    }


}
