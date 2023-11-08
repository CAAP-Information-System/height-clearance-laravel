<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($application_id)
    {
        $applicationData = Application::find($application_id);

        if ($applicationData) {
            // Assuming there's a user associated with the application
            $userData = $applicationData->user;

            return view('components.my_profile', compact('applicationData', 'userData'), );
        } else {
            return view('components.home');
        }
    }
}
