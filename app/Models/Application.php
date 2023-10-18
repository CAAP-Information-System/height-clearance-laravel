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
        'images',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function representative()
    {
        return $this->hasOne(Representative::class);
    }
}
