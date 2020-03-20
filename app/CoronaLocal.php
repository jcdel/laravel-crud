<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoronaLocal extends Model
{
    protected $fillable = [
        'name', 
        'sex', 
        'age',
        'address',
        'nationality',
        'hospital_name',
    ];
}
