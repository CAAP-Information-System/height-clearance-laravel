<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Application extends Model
{
    protected $fillable = [
        'application_number',
        'permit_type',
        'building_type',
        'type_of_structure',
        'site_address',
        'proposed_height',
        'extension_desc',
        'height_of_existing_structure',
        'lat_deg',
        'lat_min',
        'lat_sec',
        'long_deg',
        'long_min',
        'long_sec',
        'orthometric_height',
        'process_status',
        'is_ForEval',
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
    public function paymentReceipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function aerodrome()
    {
        return $this->hasOne(Aerodrome::class);
    }
    public function files()
    {
        return $this->hasOne(File::class);
    }
    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
    public function application_queues()
    {
        return $this->hasMany(ApplicationQueue::class);
    }
}
