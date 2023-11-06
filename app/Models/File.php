<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'elevation_plan',
        'geodetic_eng_cert',
        'control_station',
        'loc_plan',
        'comp_process_report',
        'additional_req',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
