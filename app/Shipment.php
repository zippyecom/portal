<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'user_id', 'customer_name', 'customer_address', 'customer_email', 'customer_phone', 'destination_country', 'destination_city', 'service_type', 'tb_date', 'tb_time', 'pickup_location', 'product_name', 'quantity', 'weights_id', 'product_value', 'product_reference', 'remarks', 'consignment_no', 'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
    }

    public function sheetShipment()
    {
        return $this->hasMany('App\SheetShipment');
    }

    public function collect()
    {
        return $this->hasMany('App\account');
    }

    public function tracking()
    {
        return $this->hasMany('App\ShipmentTracking')->orderBy('id', 'desc');
    }

    public function weights()
    {
        return $this->belongsTo('App\Weights');
    }
}
