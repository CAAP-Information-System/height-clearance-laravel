<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'type_of_structure',
        'site_address',
        'proposed_height',
        'height_of_existing_structure',
        'permit_type',
        'building_type',
        'submission_date',
        'receipt_num',
        'date_of_or',
        'lat_deg',
        'lat_min',
        'lat_sec',
        'long_deg',
        'long_min',
        'long_sec',
        'orthometric_height',
        'images',
        'process_status',
    ];
    public static function generateApplicationNumber()
    {
        // Fetch the last application number from the database
        $lastApplicationNumber = Application::orderBy('id', 'desc')->value('application_number');

        // Extract the incrementing part ('001') and increment it
        $parts = explode('-', $lastApplicationNumber);
        $incrementPart = intval($parts[0]);
        $nextIncrementPart = str_pad($incrementPart + 1, 3, '0', STR_PAD_LEFT);

        // Combine with the constant part ('23')
        return $nextIncrementPart . '-23';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function representative()
    {
        return $this->hasOne(Representative::class);
    }
}
