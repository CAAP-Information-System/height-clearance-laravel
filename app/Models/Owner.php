<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'owner_fname',
        'owner_lname',
        'owner_email',
        'owner_address',
        'owner_landline',
        'owner_mobile',
    ];

    public function application()
    {
        return $this->hasMany(Application::class, 'owner_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
