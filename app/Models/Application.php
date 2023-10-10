<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'landline',
        'owner_address',
        'mobile',
        'type_of_structure',
        'site_address',
        'proposed_height',
        'height_of_existing_structure',
        'permit_type'
    ];
}
