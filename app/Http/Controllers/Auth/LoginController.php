<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function authenticated()
    {
        // Will redirect to Dashboard if logged in as admin
        if(Auth::user()->access_role == 'admin')
        {
            return redirect('admin/dashboard');
        }
        // Will redirect to Home Page if logged in as Ad
        else if(Auth::user()->access_role == 'user')
        {
            return redirect('/home');
        }
        else if(Auth::user()->access_role == 'adms')
        {
            return redirect('/home');
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect('home');  // Redirect to the home page if authenticated
        }

        return view('auth.login');
    }
}
