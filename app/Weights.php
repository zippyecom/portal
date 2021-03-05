<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weights extends Model
{
    //
    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function shipment()
    {
        return $this->hasMany('App\Shipment');
    }
}
