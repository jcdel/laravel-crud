<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoronaLocal extends Model
{
    protected $fillable = [
        'corona_global_id',
        'name', 
        'sex', 
        'age',
        'address',
        'nationality',
        'hospital_name',
    ];
}
