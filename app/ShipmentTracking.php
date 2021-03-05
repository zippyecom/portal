<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentTracking extends Model
{
    protected $fillable = [
        'shipment_id', 'description', 
    ];

    public function shipment()
    {
        return $this->belongsTo('App\Shipment');
    }
}
