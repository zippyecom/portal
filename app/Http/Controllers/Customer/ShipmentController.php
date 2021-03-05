<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Pickup;
use App\Shipment;
use App\Weights;
use App\Settings;
use App\SheetShipment;
use App\ShipmentTracking;
use App\Alert;
use App\User;
use App\Sheet;
use App\account;
use App\Imports\ShipmentImport;
use Maatwebsite\Excel\Facades\Excel;

class ShipmentController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth')->except('shipment_tracking_qr');
    }

    public function index()
    {
        if(Auth::user()->hasRole('customer'))
            return redirect()->route('index');
        $shipments = Shipment::all();

        $read_status = Alert::where('to', '=', 'Support')->
                            where('link', '=', '/shipment/index')
                            ->update([
                                'isRead' => 1,
                            ]);

        return view('shipments.index')->with(compact('shipments'));
    }

    public function new_shipments()
    {
        if(Auth::user()->hasRole('customer'))
            return redirect()->route('index');
        $shipments = Shipment::where('status', 'Booked')->get();

        $read_status = Alert::where('to', '=', 'Support')->
                            where('link', '=', '/shipment/new')
                            ->update([
                                'isRead' => 1,
                            ]);
        return view('shipments.new-shipments')->with(compact('shipments'));
    }

    public function arrived_shipments()
    {
        
        if(Auth::user()->hasRole('customer'))
            return redirect()->route('index');
        $shipments = Shipment::where('status', 'Arrived')->get();
        return view('shipments.arrived-shipments')->with(compact('shipments'));
    }

    public function in_transit_shipments()
    {
        
        if(Auth::user()->hasRole('customer'))
            return redirect()->route('index');
        $shipments = Shipment::where('status', 'In-Transit')->get();
        return view('shipments.in-transit-shipments')->with(compact('shipments'));
    }

    public function delivered_shipments()
    {
        
        if(Auth::user()->hasRole('customer'))
            return redirect()->route('index');
        $shipments = Shipment::where('status', 'Delivered')->get();
        return view('shipments.delivered-shipments')->with(compact('shipments'));
    }

    public function returned_shipments()
    {
        
        if(Auth::user()->hasRole('customer'))
            return redirect()->route('index');
        $shipments = Shipment::where('status', 'Returned')->get();
        return view('shipments.returned-shipments')->with(compact('shipments'));
    }

    // public function bulk_shipment_add(Request $request)
    // {
    //     $file = $request->file('import_file');
    //     if($file) {
    //         Excel::import(new ShipmentImport, $file);

    //         $success = 'Shipments added';
    //         return back()->with('success', $success);
    //     }
    //     else {
    //         $error = 'Unable to upload file';
    //         return back()->with('error', $error);
    //     }    
        
    // }

    public function bulk_shipment_add(Request $request)
    {
        $file = $request->file('import_file');
        $weight_id = $request->get('weight_id');
        if($file) {
            Excel::import(new ShipmentImport($weight_id), $file);

            $success = 'Shipments added';
            return back()->with('success', $success);
        }
        else {
            $error = 'Unable to upload file';
            return back()->with('error', $error);
        }        
    }

    public function create()
    {
        if(!Auth::user()->hasRole('customer'))
            return redirect()->route('index');

        $weights = Weights::where('user_id', Auth::user()->id)->get();
        $pickups = Auth::user()->company->pickups;
        return view('customer.add_shipment')->with(compact('pickups', 'weights'));
    }
    
    public function store(Request $request)
    {
        $consign_no = Settings::where('name', 'consign_no')->first()->value;
        $increment = $consign_no+1;

        $initial = "12".date("y");
        $consignment_no = $initial.$increment;

        $update_setting = Settings::where('name', 'consign_no')->first();
        $update_setting->value = $increment;
        $update_setting->save();

        $shipment = new Shipment();
        $shipment->user_id = Auth::user()->id;
        $shipment->customer_name = $request->get('customer_name');
        $shipment->customer_address = $request->get('customer_address');
        $shipment->customer_email = $request->get('customer_email');
        $shipment->customer_phone = $request->get('customer_phone');
        $shipment->destination_country = $request->get('destination_country');
        $shipment->destination_city = $request->get('destination_city');
        $shipment->service_type = $request->get('service_type');
        $shipment->tb_date = $request->get('tb_date');
        $shipment->tb_time = $request->get('tb_time');
        $shipment->pickup_location = $request->get('pickup_location');
        $shipment->product_name = $request->get('product_name');
        $shipment->quantity = $request->get('quantity');
        $shipment->consignment_no = $consignment_no;
        $shipment->weights_id = $request->get('weight');
        $shipment->product_value = $request->get('product_value');
        $shipment->product_reference = $request->get('product_reference');
        $shipment->remarks = $request->get('remarks');
        $shipment->collect_cash = $request->get('collect_cash') === 'on' ? 1 : 0;
        $shipment->status = "Booked";

        $shipment->save();

        $tracking = new ShipmentTracking();
        $tracking->shipment_id = $shipment->id;
        $tracking->description = "Shipment booked";
        $tracking->save();

        $alert = new Alert();
        $alert->notification_text = "New shipment# ".$shipment->consignment_no." is added by customer# ".Auth::user()->id;
        $alert->to = "Support";
        $alert->from = Auth::user()->id;
        $alert->link = "/shipment/new";

        $alert->save();

        $success = 'Shipment added';
        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $shipment = Shipment::find($id);
        $shipment->weight = $request->get('weight');
        $shipment->product_value = $request->get('product_value');

        $shipment->save();

        $success = 'Shipment updated';
        return back()->with('success', $success);
    }

    public function delete($id)
    {
        $shipment = shipment::find($id);
        $sheetShipment = SheetShipment::where('shipment_id', $id)->first();
        $shipment->delete();
        $sheetShipment->delete();
		
		$success = "Shipment deleted";
        return back()->with('success', $success);
    }

    public function print_cn($id)
    {
        $shipment = Shipment::findOrFail($id);
        
        return view('shipments/cn', with(compact('shipment')));
    }

    public function customer_shipments()
    {
        $shipments = Shipment::all();
        
        $read_status = Alert::where('to', '=', (string)Auth::user()->id)->
                            where('link', '=', '/customer-shipments')
                            ->update([
                                'isRead' => 1,
                            ]);

        return view('shipments/customer-shipments', with(compact('shipments')));
    }

    public function services()
    {
        $weights = Weights::where('user_id', Auth::user()->id)->get();

        return view('customer.services', with(compact('weights')));
    }

    public function tracking()
    {
        return view('customer.services');
    }

    public function barcode_search($data) 
    {
        $barcode = $data;

        // dd($barcode);
        $shipment = Shipment::where('consignment_no', $barcode)->with('weights')->get();
        $scan_success = Array();
        $scan_success["ifFound"] = false;
        if($shipment->count()>0){
        $scan_success["shipment"] = $shipment[0];
        $scan_success["ifFound"] = true;
        }

        
        return $scan_success;
    }

    public function sheetShipment_search($data) 
    {
        $barcode = $data;
        // dd($barcode);
       // $shipment = Shipment::where('consignment_no', $barcode)->with('weights')->get();
        $sheetShipment = SheetShipment::where('id', $barcode)->with('shipment')->get();
        // dd($sheetShipment);
        $scan_success = Array();
        $scan_success["ifFound"] = false;
        if($sheetShipment->count()>0){
        $scan_success["sheetShipment"] = $sheetShipment[0];
        $scan_success["ifFound"] = true;
        }

        
        return $scan_success;
    }

    public function storecollect(Request $request)
    {
       
        $shipment = new account();
        $shipment->user_id = Auth::user()->id;
        $shipment->sheet_shipment_id = $request->get('sheet_shipment_id');
        $shipment->total_amount = $request->get('total_amount');
        $shipment->cod_amount = $request->get('cod_amount');
        $shipment->balance = $request->get('balance');
    
        $shipment->save();

        $success = 'Cod payment added';
        return back()->with('success', $success);
    }

    public function shipment_tracking($id) {
        if(!Auth::user()->hasRole('admin|operation'))
            return redirect()->route('index');

        $tracking = new ShipmentTracking();
        $tracking->shipment_id = $id;

        $shipment = Shipment::find($id);
        if($shipment->status == "Booked" || $shipment->status == "Pickup"){
            $shipment->status = "Arrived";
            $tracking->description = "Shipment arrived at ZIPPY office";

            $notification = new Alert();
            $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is arrived at ZIPPY office.";
            $notification->to = $shipment->user_id;
            $notification->from = "Support";
            $notification->link = "/customer-shipments";
            $notification->save();
            $tracking->save();
            $shipment->save();
        }
        elseif($shipment->status == "Arrived"){
            $shipment->status = "In-Transit";
            $tracking->description = "Shipment is in Transit";

            $notification = new Alert();
            $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is in transit.";
            $notification->to = $shipment->user_id;
            $notification->from = "Support";
            $notification->link = "/customer-shipments";
            $notification->save();
            $tracking->save();
            $shipment->save();
        }
        elseif($shipment->status == "In-Transit"){
            $shipment->status = "Delivered";
            $tracking->description = "Shipment delivered";

            $notification = new Alert();
            $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is delivered.";
            $notification->to = $shipment->user_id;
            $notification->from = "Support";
            $notification->link = "/customer-shipments";
            $notification->save();
            $tracking->save();
            $shipment->save();
        }

        $success = "Shipment status changed";
        return back()->with('success', $success);
    }

    // void for returned and arrived shipments
    public function void_arrived($id)
    {
        if(!Auth::user()->hasRole('admin'))
            return redirect()->route('index');
        
        $tracking = new ShipmentTracking();
        $tracking->shipment_id = $id;
        $shipment = Shipment::find($id);
        $shipment->status = "Arrived";
        $tracking->description = "Shipment arrived at ZIPPY office";

        $notification = new Alert();
        $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is arrived at ZIPPY office.";
        $notification->to = $shipment->user_id;
        $notification->from = "Support";
        $notification->link = "/customer-shipments";
        $notification->save();
        $tracking->save();
        $shipment->save();

        $success = "Shipment status changed";
        return back()->with('success', $success);
    }

    public function void_inTransit($id)
    {
        if(!Auth::user()->hasRole('admin'))
            return redirect()->route('index');
        
        $tracking = new ShipmentTracking();
        $tracking->shipment_id = $id;
        $shipment = Shipment::find($id);
        $shipment->status = "In-Transit";
        $tracking->description = "Shipment is in Transit";

        $notification = new Alert();
        $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is in transit.";
        $notification->to = $shipment->user_id;
        $notification->from = "Support";
        $notification->link = "/customer-shipments";
        $notification->save();
        $tracking->save();
        $shipment->save();
        $success = "Shipment status changed";
        return back()->with('success', $success);
    }
    
    public function void_delivered($id)
    {
        if(!Auth::user()->hasRole('admin'))
            return redirect()->route('index');
        
        $tracking = new ShipmentTracking();
        $tracking->shipment_id = $id;
        $shipment = Shipment::find($id);
        $shipment->status = "Delivered";
        $tracking->description = "Shipment delivered";

        $notification = new Alert();
        $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is delivered.";
        $notification->to = $shipment->user_id;
        $notification->from = "Support";
        $notification->link = "/customer-shipments";
        $notification->save();
        $tracking->save();
        $shipment->save();
        $success = "Shipment status changed";
        return back()->with('success', $success);
    }

    public function shipment_returned_comment(Request $request)
    {
        $shipment_id = $request->get('shipment_id');

        $tracking = new ShipmentTracking();
        $tracking->shipment_id = $shipment_id;
        $tracking->description = "Shipment returned due to ". $request->get('return_comment');

        $shipment = Shipment::find($shipment_id );
        $shipment->comment = $request->get('return_comment');
        $shipment->status = "Returned";

        $tracking->save();
        $shipment->save();

        $notification = new Alert();
        $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is returned.";
        $notification->to = $shipment->user_id;
        $notification->from = "Support";
        $notification->link = "/customer-shipments";
        $notification->save();

        $success = "Shipment returned";
        return back()->with('success', $success);
    }

    public function shipment_cancel($id)
    {
        $shipment = Shipment::find($id );
        $shipment->status = "Cancelled";

        $shipment->save();

        $tracking = new ShipmentTracking();
        $tracking->shipment_id = $shipment->id;
        $tracking->description = "Shipment Cancelled";
        $tracking->save();

        $notification = new Alert();
        $notification->notification_text = "Shipment# ".$shipment->consignment_no." is Cancelled.";
        $notification->to = "Support";
        $notification->from = $shipment->user_id;
        $notification->link = "/shipment/index";
        $notification->save();

        $success = "Shipment cancelled";
        return back()->with('success', $success);
    }

    public function shipment_tracking_qr($cn)
    {
        $shipment = Shipment::where('consignment_no', $cn)->first();
        if (!$shipment){
            return view('shipments/shipment-tracking-nf', with(compact('cn')));
        } else {
            return view('shipments/shipment-tracking', with(compact('shipment')));
        }
        
    }

    public function shipment_advice($id) 
    {
        $shipment = Shipment::find($id);
        if($shipment->status !== 'Returned' || $shipment->user_id !== Auth::User()->id){
            return redirect()->route('index');
        }
        
        return view('shipments.shipment-advice', with(compact('shipment')));
    }

    public function shipment_advice_store(Request $request, $id) 
    {
        $shipment = Shipment::find($id);
        $shipment->return_advice = $request->get('return_advice');

        $shipment->save();

        $success = "Shipment advice added";
        return back()->with('success', $success);
    }

    public function reports()
    {
        $customers = User::role('customer')->get();
        $riders = User::role('rider')->get();
        return view('shipments.reports', with(compact('customers', 'riders')));
    }

    public function reports_generate(Request $request, $reportKey)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $to_city = $request->get('to_city');
        $customer = $request->get('customer');
        $rider = $request->get('rider');

        if($reportKey == 111) {
            // $shipments = Shipment::where('status', 'Booked')->get();
            if($customer == 'All') {
                $shipments = Shipment::where('status', 'Booked')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->get();  
            }
            else {
                $shipments = Shipment::where('status', 'Booked')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            }

            $fileName = 'Booked-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Booked Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }
        
        if($reportKey == 222) {
            // $shipments = Shipment::where('status', 'Arrived')->get();
            if($customer == 'All') {
                $shipments = Shipment::where('status', 'Arrived')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->get();  
            }
            else {
                $shipments = Shipment::where('status', 'Arrived')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            }
            

            $fileName = 'Arrived-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Arrived Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 333) {
            // $shipments = Shipment::where('status', 'In-Transit')->get();
            if($customer == 'All') {
                $shipments = Shipment::where('status', 'In-Transit')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->get();  
            }
            else {
                $shipments = Shipment::where('status', 'In-Transit')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            }

            $fileName = 'InTransit-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with(DB::raw('DATE(created_at)'), $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">In-Transit Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 444) {
            // $shipments = Shipment::where('status', 'Delivered')->get();
            if($customer == 'All') {
                $shipments = Shipment::where('status', 'Delivered')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->get();  
            }
            else {
                $shipments = Shipment::where('status', 'Delivered')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            }

            $fileName = 'Delivered-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Delivered Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 555) {
            // $shipments = Shipment::where('status', 'Returned')->get();
            if($customer == 'All') {
                $shipments = Shipment::where('status', 'Returned')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->get();  
            }
            else {
                $shipments = Shipment::where('status', 'Returned')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            }

            $fileName = 'Returned-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Returned Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 666) {
            // $shipments = Shipment::where('status', 'Cancelled')->get();
            if($customer == 'All') {
                $shipments = Shipment::where('status', 'Cancelled')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->get();  
            }
            else {
                $shipments = Shipment::where('status', 'Cancelled')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            }

            $fileName = 'Cancelled-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Cancelled Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 777) {
            // $sheets = DB::select('SELECT * FROM sheets where ');
            $sheets = DB::table('sheets')
                            ->select(DB::raw('count(*) as deliveries, DATE(created_at) as delivery_date'))
                            ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                            ->where('station', $to_city)
                            // ->where('rider', $rider)
                            ->where('user_id', $rider)
                            ->groupBy(DB::raw('DATE(created_at)'))
                            ->get();

            // foreach ($sheets as $sheet){
            //     echo($sheet->delivery_date);
            //     echo($sheet->deliveries);
            // }

            $fileName = 'Deliveries-report.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.delivery-report')->with(compact('rider', 'sheets', 'from_date', 'to_date'));
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Riders Deliveries Report</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 000) {
            if($customer == 'All') {
                $shipments = Shipment::whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->get();  
            }
            else {
                $shipments = Shipment::whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            }
            
            $fileName = 'All-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">All Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 888) {
            if($customer == 'All') {
                $shipments = Shipment::where('status', 'Delivered')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->get();
                        

            }
            else {
                $shipments = Shipment::where('status', 'Delivered')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            }

            $weights_arr = array();
            $prices_arr = array();
            foreach ($shipments as $shipment) {
                $weights_arr[] = $shipment->weights_id;
            }

            $weights = array_count_values($weights_arr);

            $fileName = 'payment-report.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.payment-report-page')->with(compact('shipments', 'weights'));
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Payment Reports</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }
    }

    // customer dashboard reports
    public function customer_reports()
    {
        return view('shipments.customer-ship-reports.reports');
    }

    public function customer_reports_generate(Request $request, $reportKey)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $to_city = $request->get('to_city');
        $customer = Auth::user()->id;

        if($reportKey == 111) {
            $shipments = Shipment::where('status', 'Booked')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();

            $fileName = 'Booked-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Booked Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }
        
        if($reportKey == 222) {
            $shipments = Shipment::where('status', 'Arrived')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            

            $fileName = 'Arrived-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Arrived Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 333) {
            $shipments = Shipment::where('status', 'In-Transit')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();

            $fileName = 'InTransit-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with(DB::raw('DATE(created_at)'), $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">In-Transit Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 444) {
            $shipments = Shipment::where('status', 'Delivered')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();

            $fileName = 'Delivered-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Delivered Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 555) {
            $shipments = Shipment::where('status', 'Returned')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();

            $fileName = 'Returned-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Returned Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 666) {
            $shipments = Shipment::where('status', 'Cancelled')
                                        ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();

            $fileName = 'Cancelled-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Cancelled Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 000) {
            $shipments = Shipment::whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                        ->where('destination_city', $to_city)
                                        ->where('user_id', $customer)
                                        ->get();
            
            $fileName = 'All-Shipments.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.report-page')->with('shipments', $shipments);
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">All Shipments</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }

        if($reportKey == 888) {
            $shipments = Shipment::where('status', 'Delivered')
                                    ->whereBetween(DB::raw('DATE(created_at)'), [$from_date, $to_date])
                                    ->where('destination_city', $to_city)
                                    ->where('user_id', $customer)
                                    ->get();

            $weights_arr = array();
            $prices_arr = array();
            foreach ($shipments as $shipment) {
                $weights_arr[] = $shipment->weights_id;
            }

            $weights = array_count_values($weights_arr);

            $fileName = 'payment-report.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'orientation' => 'L'
            ]);

            $html = \View::make('shipments.payment-report-page')->with(compact('shipments', 'weights'));
            $html = $html->render();
            $mpdf->WriteHTML('<h2 style="text-align: center;">Payment Reports</h2>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($fileName, 'I');
        }
    }

    public function notdone_advices() {
        $shipments = Shipment::where('status', 'Returned')
                               ->where('return_advice_status', '0')
                               ->get();
        
        return view('shipments.advices.not-done', with(compact('shipments')));
    }

    public function done_advices() {
        $shipments = Shipment::where('status', 'Returned')
                               ->where('return_advice_status', '1')
                               ->get();
        
        return view('shipments.advices.done', with(compact('shipments')));
    }

    public function return_advice_status_update($id) {
        $shipments = Shipment::find($id);
        $shipments->return_advice_status = 1;

        $shipments->save();

        $success = "Record Updated";
        return back()->with('success', $success);
    }

    public function customer_notdone_advices() {
        $shipments = Shipment::where('status', 'Returned')
                                ->where('user_id', Auth::user()->id)
                                ->where('return_advice_status', '0')
                                ->get();
        
        return view('shipments.customer-advices.not-done', with(compact('shipments')));
    }

    public function customer_done_advices() {
        $shipments = Shipment::where('status', 'Returned')
                                ->where('user_id', Auth::user()->id)
                                ->where('return_advice_status', '1')
                                ->get();
        
        return view('shipments.customer-advices.done', with(compact('shipments')));
    }
}
