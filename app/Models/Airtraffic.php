<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airtraffic extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'application_id',
        'evaluation_status',
        'doc_compliance_result',
        'crit_area_result',
        'reference_aerodrome',
        'max_allowed_top_elev',
        'height_eval_remarks',
        'proposed_top_elev',
        'eval_result',
        'supervisor_result'
    ];

    // Define the relationship with the Aerodrome model
    public function aerodrome()
    {
        return $this->belongsTo(Aerodrome::class, 'reference_aerodrome');
    }
}
