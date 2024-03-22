<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aerodrome extends Model
{
    protected $fillable = [
        'evaluation_status',
        'ep_comp',
        'ge_comp',
        'cs_comp',
        'lp_comp',
        'cp_comp',
        'ar_comp',
        'elev_plan_remarks',
        'geodetic_eng_remarks',
        'control_station_remarks',
        'loc_plan_remarks',
        'comp_process_report_remarks',
        'additional_req_remarks',
        'doc_compliance_result',
        'crit_area_result',
        'reference_aerodrome',
        'max_allowed_top_elev',
        'height_eval_remarks',
        'proposed_top_elev',
        'eval_result',
        'supervisor_result'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function airtraffic()
    {
        return $this->hasOne(Airtraffic::class);
    }
}
