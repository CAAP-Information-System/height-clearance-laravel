<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'compliance_status',
        'elev_plan_remarks',
        'geodetic_eng_remarks',
        'control_station_remarks',
        'loc_plan_remarks',
        'comp_process_report_remarks',
        'additional_req_remarks',
        'doc_compliance_result',
        'crit_area_result',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
