<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Representative;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            // Validation rules for User model
            'rep_fname' => ['required', 'string', 'max:255'],
            'rep_lname' => ['required', 'string', 'max:255'],
            'rep_company' => ['required', 'string', 'max:255'],
            'rep_office_address' => ['required', 'string', 'max:255'],
            'rep_landline' => ['required', 'numeric'],
            'rep_mobile' => ['required', 'numeric', 'digits:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

    }

    protected function create(array $data)
    {
        $user = User::create([
            'rep_fname' => $data['rep_fname'],
            'rep_lname' => $data['rep_lname'],
            'rep_company' => $data['rep_company'],
            'rep_office_address' => $data['rep_office_address'],
            'rep_landline' => $data['rep_landline'],
            'rep_mobile' => $data['rep_mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);



        return $user;
    }
}
