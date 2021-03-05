<?php

namespace App\Imports;

use App\Shipment;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
Use Auth;
use App\Settings;
use App\ShipmentTracking;
use App\Alert;

class ShipmentImport implements ToCollection, WithHeadingRow
{
    public function  __construct($weight_id)
    {
        $this->weight_id= $weight_id;
    }

    public function collection(Collection $rows)
    {
        $user_id = Auth::User()->id;
        

        foreach ($rows as $row) 
        {
            $consign_no = Settings::where('name', 'consign_no')->first()->value;
            $increment = $consign_no+1;

            $initial = "12".date("y");
            $consignment_no1 = $initial.$increment;

            $update_setting = Settings::where('name', 'consign_no')->first();
            $update_setting->value = $increment;
            $update_setting->save();

            $shipment = Shipment::create([
                'user_id'                   => $user_id,
                'customer_name'             => $row['customer_name'],
                'customer_address'          => $row['customer_address'],
                'customer_email'            => $row['customer_email'],
                'customer_phone'            => $row['customer_phone'],
                'destination_country'       => $row['destination_country'],
                'destination_city'          => $row['destination_city'],
                'service_type'              => $row['service_type'],
                'tb_date'                   => $row['tb_date'],
                'tb_time'                   => $row['tb_time'],
                'pickup_location'           => $row['pickup_address'],
                'product_name'              => $row['product_name'],
                'quantity'                  => $row['product_quantity'],
                'consignment_no'            => $consignment_no1,
                'weights_id'                => $this->weight_id,
                'product_value'             => $row['product_value'],
                'product_reference'         => $row['product_reference'],
                'remarks'                   => $row['remarks'],
                'status'                    => 'Booked',
            ]);


            ShipmentTracking::create([
                'shipment_id'               => $shipment->id,
                'description'               => "Shipment booked",
            ]);

            Alert::create([
                'notification_text'         => "New shipment# ".$shipment->consignment_no." is added by customer# ".$user_id,
                'to'                        => 'Support',
                'from'                      => $user_id,
                'link'                      => "/shipment/new",
            ]);
        }
    }
}
