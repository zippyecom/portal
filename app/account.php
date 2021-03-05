<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    public function sheet()
    {
        return $this->belongsTo('App\Sheet');
    }

    public function shipment()
    {
        return $this->belongsTo('App\Shipment');
    }

    public function sheet_shipment()
    {
        return $this->belongsTo('App\SheetShipment');
    }
}
