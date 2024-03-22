<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditedAerodrome extends Model
{
    use HasFactory;
    protected $fillable = [
        'proposed_height',
        'lat_deg',
        'lat_min',
        'lat_sec',
        'long_deg',
        'long_min',
        'long_sec',
        'height_of_existing_structure',
        'orthometric_height',
        'doc_compliance_result',
        'crit_area_result',
        'reference_aerodrome',
        'max_allowed_top_elev',
        'height_eval_remarks',
        'proposed_top_elev',
        'evaluation_status',
    ];


}
