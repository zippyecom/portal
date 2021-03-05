<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Sheet;
use App\Rider;
use App\Shipment;
use App\SheetShipment;
use App\ShipmentTracking;
use App\account;
use App\Alert;

class AdminController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = User::Role('customer')->orderBy('created_at', 'desc')->take(10)->get();
        $booked_shipments = Shipment::where('status', 'Booked')->
                                where('user_id', Auth::user()->id)->count();
        $arrived_shipments = Shipment::where('status', 'Arrived')->
                                where('user_id', Auth::user()->id)->count();
        $in_transit_shipments = Shipment::where('status', 'In-Transit')->
                                where('user_id', Auth::user()->id)->count();
        $delivered_shipments = Shipment::where('status', 'Delivered')->
                                where('user_id', Auth::user()->id)->count();
        $returned_shipments = Shipment::where('status', 'Returned')->
                                where('user_id', Auth::user()->id)->count();
        $cancelled_shipments = Shipment::where('status', 'Cancelled')->
                                where('user_id', Auth::user()->id)->count();

        $total_booked_shipments = Shipment::where('status', 'Booked')->count();
        $total_arrived_shipments = Shipment::where('status', 'Arrived')->count();
        $total_in_transit_shipments = Shipment::where('status', 'In-Transit')->count();
        $total_delivered_shipments = Shipment::where('status', 'Delivered')->count();
        $total_returned_shipments = Shipment::where('status', 'Returned')->count();
        $total_cancelled_shipments = Shipment::where('status', 'Cancelled')->count();

        // for admin dashboard - Users Registration Statistics
        $users_date = DB::select('SELECT DATE(created_at) as reg_date, count(*) as users_count FROM users GROUP BY DATE(created_at)');

        $count_array = Array();
        foreach($users_date as $key => $item){
            array_push($count_array, $item->users_count);
        }
        $count_array = "[".implode(", ",$count_array)."]";

        $date_array = Array();
        foreach($users_date as $key => $item){
            array_push($date_array, $item->reg_date);
        }
        $date_array = '["'.implode('", "',$date_array).'"]';

        // for customer dashboard - shipment created Statistics
        $current_user = Auth::user()->id;
        $ships_date = DB::select("SELECT DATE(created_at) as create_date, count(*) as ship_count FROM shipments WHERE user_id = '$current_user' GROUP BY DATE(created_at)");
        
        $ships_array = Array();
        foreach($ships_date as $key => $item){
            array_push($ships_array , $item->ship_count);
        }
        $ships_array = "[".implode(", ",$ships_array)."]";

        $ship_date_array = Array();
        foreach($ships_date as $key => $item){
            array_push($ship_date_array, $item->create_date);
        }
        $ship_date_array = '["'.implode('", "',$ship_date_array).'"]';

        $shipments = Shipment::where('user_id', Auth::user()->id)->get();

        $activities = array();
        foreach($shipments as $shipment){
            $temp_shipment = ShipmentTracking::where('shipment_id', $shipment->id)->
                                            where('created_at', '>=', \Carbon\Carbon::today()->toDateString())->get();
            foreach($temp_shipment as $ts){
                array_push($activities,$ts);
            }
        }


        $monthly_revenue = DB::select("SELECT SUM(product_value) as sum FROM shipments WHERE user_id = '$current_user' AND status IN ('Booked', 'Arrived', 'In-Transit', 'Delivered') AND MONTH(created_at) = 
        MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE()) GROUP BY DATE(created_at) " );

        $total_monthly_revenue = 0;
        foreach($monthly_revenue as $key => $item){
            $total_monthly_revenue += $item->sum;
        }

        $monthly_revenue_array = Array();
        foreach($monthly_revenue as $key => $item){
            array_push($monthly_revenue_array , $item->sum);
        }
        $monthly_revenue_array = "[".implode(", ",$monthly_revenue_array)."]";

        $total_customers = User::role('customer')->count();
        $total_riders = User::role('rider')->count();
        $total_admins = User::role('admin')->count();
        $total_operations = User::role('operation')->count();
        $total_accounts = User::role('account')->count();

        return view('dashboard.index', with(compact('vendors', 'booked_shipments', 'arrived_shipments', 'in_transit_shipments', 'delivered_shipments', 'returned_shipments', 'cancelled_shipments', 'count_array', 'date_array', 'total_booked_shipments', 'total_arrived_shipments', 'total_in_transit_shipments', 'total_delivered_shipments', 'total_returned_shipments', 'total_cancelled_shipments', 'ships_array', 'ship_date_array', 'activities', 'monthly_revenue_array', 'total_monthly_revenue', 'total_customers', 'total_riders', 'total_admins', 'total_operations', 'total_accounts')));
    }

    public function delivery_sheets_index()
    {
        $delivery_sheets = Sheet::all();
        $riders = User::Role('rider')->get();
        $shipments = Shipment::all();
        $rider_ds = Sheet::where('user_id', Auth::user()->id)->get();
        return view('admin.delivery-sheets.index', with(compact('delivery_sheets', 'riders', 'shipments', 'rider_ds')));
    }

    public function shipByStation($station)
    {
        $shipments = Shipment::where('destination_city', $station)
                                ->whereIn('status', ['Arrived', 'Booked'])
                                ->get();
        return $shipments;
    }
    
    public function delivery_sheet_store(Request $request)
    {
        $delivery_sheet = new Sheet();
        $delivery_sheet->route = $request->get('route');
        $delivery_sheet->user_id = $request->get('rider');
        $delivery_sheet->station = $request->get('station');
        $delivery_sheet->date = $request->get('date');

        $shipments = $request->get('shipment');

        $delivery_sheet->save();

        foreach($shipments as $shipment)
        {
            $shipment_sheet = new SheetShipment();
            $shipment_sheet->sheet_id = $delivery_sheet->id;
            $shipment_sheet->shipment_id = $shipment;

            $ship = Shipment::find($shipment);
            if ($ship->status == 'Booked')
            {
                $ship->status = 'Pickup';
                $tracking = new ShipmentTracking();
                $tracking->shipment_id = $shipment;
                $tracking->description = "Rider is on the way for Pickup";

                $notification = new Alert();
                $notification->notification_text = "Rider is on the way for the pickup of shipment# ".$ship->consignment_no.".";
                $notification->to = $ship->user_id;
                $notification->from = "Support";
                $notification->link = "/customer-shipments";

                $tracking->save();
                $notification->save();
                $ship->save();
            }
            elseif ($ship->status == 'Arrived')
            {
                $ship->status = 'In-Transit';
                $tracking = new ShipmentTracking();
                $tracking->shipment_id = $shipment;
                $tracking->description = "Shipment is in Transit.";

                $notification = new Alert();
                $notification->notification_text = "Your shipment# ".$ship->consignment_no." is in transit.";
                $notification->to = $ship->user_id;
                $notification->from = "Support";
                $notification->link = "/customer-shipments";

                $tracking->save();
                $notification->save();
                $ship->save();
            }
            $shipment_sheet->save();
        }
        
        $success = "Delivery sheet generated";
        return back()->with('success', $success);
    }

    public function delivery_sheet_destroy($id)
    {
        $sheet = Sheet::find($id);
        $shipment_sheet = SheetShipment::where('sheet_id', $id);

        $sheet->delete();
        $shipment_sheet->delete();

        $success = "Delivery sheet deleted successfully";
        return back()->with('success', $success);
    }

    public function delivery_sheet_details($id)
    {
        $sheet = Sheet::find($id);
        if($sheet->user_id != Auth::user()->id && Auth::user()->hasRole('rider')){
            return redirect()->route('index');
        }
        $shipmentSheets = SheetShipment::where('sheet_id', $id)->get();
        $sheet_id = $id;
        return view('admin.delivery-sheets.shipment-sheet', with(compact('shipmentSheets', 'sheet_id')));
    }

    public function delivery_sheet_print($id)
    {
        $shipmentSheets = SheetShipment::where('sheet_id', $id)->get();
        $sheet = Sheet::find($id);
        return view('admin.delivery-sheets.print-sheet', with(compact('shipmentSheets', 'sheet')));
    }

    public function shipment_sheet_destroy($id)
    {
        $shipment_sheet = SheetShipment::where('id', $id);

        $shipment_sheet->delete();

        $success = "Delivery sheet deleted successfully";
        return back()->with('success', $success);
    }

    // ph2 sheets 
    public function ph2_sheets_index()
    {
        $delivery_sheets = Sheet::all();
        $riders = User::Role('rider')->get();
        $shipments = Shipment::all();
        $rider_ds = Sheet::where('user_id', Auth::user()->id)->get();
        return view('admin.delivery-sheets.ph2.index', with(compact('delivery_sheets', 'riders', 'shipments', 'rider_ds')));
    }

    public function ph2_delivery_sheet_details($id)
    {
        $sheet = Sheet::find($id);
        if($sheet->user_id != Auth::user()->id && Auth::user()->hasRole('rider')){
            return redirect()->route('index');
        }
        $shipmentSheets = SheetShipment::where('sheet_id', $id)->get();
        $sheet_id = $id;
        return view('admin.delivery-sheets.ph2.ph2-shipment-sheet', with(compact('shipmentSheets', 'sheet_id')));
    }

    public function ph2_status_update(Request $request)
    {
        $return_comment = $request->get('return_comment');
        $return_id = $request->get('return_id');
        $sheet_id = $request->get('sheet_id');

        $count = count($return_id);
        for($i = 0; $i < $count; $i++) {
            if($return_comment[$i] == 'Delivered') {
                $tracking = new ShipmentTracking();
                $tracking->shipment_id = $return_id[$i];

                $shipment = Shipment::find($return_id[$i]);
                $shipment->status = "Delivered";
                $tracking->description = "Shipment delivered";

                $tracking->save();
                $shipment->save();

                $notification = new Alert();
                $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is Delivered.";
                $notification->to = $shipment->user_id;
                $notification->from = "Support";
                $notification->link = "/customer-shipments";
                $notification->save();
            }
            elseif($return_comment[$i] == 'Arrived') {
                $tracking = new ShipmentTracking();
                $tracking->shipment_id = $return_id[$i];

                $shipment = Shipment::find($return_id[$i]);
                $shipment->status = "Arrived";
                $tracking->description = "Shipment arrived at ZIPPY office";

                $tracking->save();
                $shipment->save();

                $notification = new Alert();
                $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is arrived at ZIPPY office.";
                $notification->to = $shipment->user_id;
                $notification->from = "Support";
                $notification->link = "/customer-shipments";
                $notification->save();
            }
            else {
                $tracking = new ShipmentTracking();
                $tracking->shipment_id = $return_id[$i];

                $shipment = Shipment::find($return_id[$i]);
                $shipment->status = "Returned";
                $shipment->comment = $return_comment[$i];
                $tracking->description = "Shipment Returned to ZIPPY office";

                $tracking->save();
                $shipment->save();

                $notification = new Alert();
                $notification->notification_text = "Your shipment# ".$shipment->consignment_no." is returned.";
                $notification->to = $shipment->user_id;
                $notification->from = "Support";
                $notification->link = "/customer-shipments";
                $notification->save();
            }

        }

        $sheet = Sheet::where('id', $sheet_id[0])->first();
        $sheet->ph2_created = 1;
        $sheet->save();

        return redirect()->route('ph2.index');
    }

    // collect sheets data 
    public function collect_sheets_index()
    {
        $delivery_sheets = Sheet::all();
        $sheet_shipment = SheetShipment::all();
        $riders = User::Role('rider')->get();
        $shipments = Shipment::all();
        $rider_ds = Sheet::where('user_id', Auth::user()->id)->get();
       
        return view('admin.delivery-sheets.ph2.cod-collection', with(compact('delivery_sheets', 'riders', 'shipments', 'rider_ds', 'sheet_shipment')));
    }

    public function collect_delivery_sheet_details($id)
    {
        $sheet_shipment = SheetShipment::find($id);
       // $sheet = Sheet::find($id);
        if($sheet_shipment ->user_id != Auth::user()->id && Auth::user()->hasRole('rider')){
            return redirect()->route('index');
        }
        $account = account::where('sheet_shipment_id', $id)->get();
        $sheet_shipment_id = $id;
        return view('admin.delivery-sheets.ph2.ph2-shipment-sheet-collection', with(compact('account', 'sheet_shipment_id')));
    }

    public function customer_bookingform(){
        return view('admin.customer.bookingform');
    }

    public function service()
    {
        $services = Services::all();
        return view('admin.customer.bookingform', compact('services'));
    }

    public function city()
    {
        $cities = DB::table("cities")->pluck("name","id");
        return view('admin.customer.bookingform',compact('cities'));
    }

    public function sub_city()
    {
        $sub_cities = DB::table("sub_cities")
            ->where("city_id",$request->city_id)
            ->pluck("name","id");
            return response()->json($sub_cities);
    }

    public function packing_type()
    {
        $packing_type = DB::table("packing_type")->pluck("name","id");
        return view('admin.customer.bookingform',compact('packing_type'));
    }

    public function goods_type()
    {
        $goods_type = DB::table("goods_type")->pluck("name","id");
        return view('admin.customer.bookingform',compact('goods_type'));
    }


}
