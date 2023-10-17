<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $fillable = [
        'rep_fname', 'rep_lname', 'rep_company', 'rep_office_address', 'rep_submission_date',
        'rep_receipt_num', 'rep_landline', 'rep_mobile', 'rep_email', 'rep_date_of_or',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'representative_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
