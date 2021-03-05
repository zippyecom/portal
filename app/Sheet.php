<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    public function sheetShipment()
    {
        return $this->hasMany('App\SheetShipment');
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
    }

    public function collect()
    {
        return $this->belongsTo('App\account');
    }
}
