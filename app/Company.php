<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pickups()
    {
        return $this->hasMany('App\Pickup');
    }
}