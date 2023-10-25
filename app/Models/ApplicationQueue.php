<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationQueue extends Model
{
    protected $fillable = [
        'queue_id',
        'adms_eval',
        'adms_supervisor',
        'adms_chief',
        'ats_eval',
        'ats_supervisor',
        'ats_chief',
        'ans_eval',
        'ans_supervisor',
        'ans_chief',
        'odg_sign',

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
