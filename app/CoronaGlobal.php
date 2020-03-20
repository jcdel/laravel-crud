<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoronaGlobal extends Model
{
    protected $fillable = [
        'country_name',
        'cases',
        'deaths',
        'recovered'
    ];

    public function coronaLocal()
    {
        return $this->hasMany(CoronaLocal::class);
    }
}
