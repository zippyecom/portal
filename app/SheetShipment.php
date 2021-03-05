<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SheetShipment extends Model
{
    public function sheet()
    {
        return $this->belongsTo('App\Sheet');
    }

    public function shipment()
    {
        return $this->belongsTo('App\Shipment', 'shipment_id');
    }

    public function collect()
    {
        return $this->belongsTo('App\account');
    }
    
   
}
