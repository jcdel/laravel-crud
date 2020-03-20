<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoronaLocal extends Model
{
    protected $fillable = [
        'corona_global_id',
        'age', 
        'gender',
        'nationality',
        'hospital_name',
        'status',
    ];

    public function coronaGlobal() {
        return $this->belongsTo(CoronaGlobal::class);
    }
}
