<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'fname' => 'required|string|max:100',
            'lname' => 'required|string|max:100',
            'email' => 'required|string|max:50',
            'landline' => 'required|numeric',
            'owner_address' => 'required|string|max:255',
            'mobile' => 'required|numeric',
            'type_of_structure' => 'required|string|max:100',
            'site_address' => 'required|string|max:100',
            'proposed_height' => 'required|numeric',
            'height_of_existing_structure' => 'required|numeric',
            'permit_type' => 'required|in:height_clearance_permit,height_limitation',
        ];
    }
}
