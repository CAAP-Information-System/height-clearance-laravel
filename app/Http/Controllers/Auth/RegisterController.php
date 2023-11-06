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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'home_address' => ['required', 'string', 'max:255'],
            'landline' => ['required', 'numeric'],
            'mobile' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'permit_type' => ['required', 'in:height_clearance_permit,height_limitation'],
            'building_type' => ['in:permanent,temporary'],

            // Add validation rules for Representative model fields here
            'rep_fname' => ['required', 'string', 'max:255'],
            'rep_lname' => ['required', 'string', 'max:255'],
            'rep_company' => ['required', 'string', 'max:255'],
            'rep_email' => ['required', 'string', 'email', 'max:255'],
            'rep_office_address' => ['required', 'string', 'max:255'],
            'rep_landline' => ['required', 'numeric'],
            'rep_mobile' => ['required', 'numeric'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'home_address' => $data['home_address'],
            'landline' => $data['landline'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'permit_type' => $data['permit_type'],
            'building_type' => $data['building_type'],
        ]);

        $representative = Representative::create([
            'rep_fname' => $data['rep_fname'],
            'rep_lname' => $data['rep_lname'],
            'rep_company' => $data['rep_company'],
            'rep_email' => $data['rep_email'],
            'rep_office_address' => $data['rep_office_address'],
            'rep_landline' => $data['rep_landline'],
            'rep_mobile' => $data['rep_mobile'],
            'user_id' => $user->id,
        ]);

        return $user;
    }
}
