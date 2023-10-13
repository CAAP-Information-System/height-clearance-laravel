<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepresentativeRequest extends FormRequest
{

    public function rules()
    {
        return [
            'rep_fname' => 'required|string|max:255',
            'rep_lname' => 'required|string|max:255',
            'rep_company' => 'required|string|max:255',
            'rep_office_address' => 'required|string|max:255',
            'rep_submission_date' => 'required|date',
            'rep_receipt_num' => 'required|string|max:255',
            'rep_mobile' => 'required|integer',
            'rep_landline' => 'required|integer',
            'rep_email' => 'required|email|max:255',
            'rep_date_of_or' => 'required|date',
        ];
    }
}
