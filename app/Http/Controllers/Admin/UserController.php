<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Company;
use App\Weights;
use App\cities;
use App\goods_type;
use App\packing_type;
use App\Settings;
use App\sub_cities;
use App\services;
use App\bookingform;
use App\Category;
use App\barcode;
use PDF;
use Picqer;


use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
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
    public function customer_index()
    {
        $customers = User::Role('customer')->get();
        return view('admin.customer.index')->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_create()
    {
        return view('admin.customer.create');
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function customer_bookingform(){
        $cities = DB::table('city')->pluck("name","id");
        return view('admin.customer.bookingform', compact('cities'));
    }

    public function getSubcities($id) {
        $subcity = DB::table("subcity")->where("city_id",$id)->pluck("name","id");

        return json_encode($subcity);
    }

    public function service()
    {
        $services = Services::all();
        $cities = Cities::all();      
        $goods = DB::table('goods_type')->get();
        $packings = DB::table('packing_type')->get();
        $subcities = DB::table('sub_cities')->get();
        $category = Category::all();
        return view('admin.customer.bookingform', ['services'=>$services, 'cities'=>$cities, 'goods'=>$goods, 'packings'=>$packings, 'subcities'=>$subcities, 'category'=>$category]);
    }


    public function city()
    {
        $cities = Cities::all();
        return view('admin.customer.bookingform', ['cities'=>$cities]);
    }

    public function sub_city()
    {
        
    }

    // public function packing_type()
    // {
    //     $packing_type = Packing_type::all();
    //     return view('admin.customer.bookingform', ['packing_type'=>$packing_type]);
    // }

    public function goods_type()
    {
        $goods_type = goods_type::all();
        return view('admin.customer.bookingform', ['goods_type'=>$goods_type]);
    }

    public function booking_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_type' => ['required', 'string'],
            'paymentMethod' => ['required', 'string'],
            'date' => ['required', 'string'],
            'customer' => ['required', 'string'],
            'status' => ['required', 'string'],
            'bookingNumber' => ['required', 'string'],
            'city' => ['required', 'string'],
            'subcity' => ['required', 'string'],
            'wtc' => ['required', 'string'],
            'tkg' => ['required', 'string'],
            'tqty' => ['required', 'string'],
            'remarks' => ['required', 'string'],
            'depSender' => ['required', 'string'],
            'sname' => ['required', 'string'],
            'scnic' => ['required', 'string'],
            'saddress' => ['required', 'string'],
            'smobile' => ['required', 'string'],
            'saddress2' => ['required', 'string'],
            'sraddress2' => ['required', 'string'],
            'scity' => ['required', 'string'],
            'depreceiver' => ['required', 'string'],
            'rname' => ['required', 'string'],
            'rcnic' => ['required', 'string'],
            'raddress' => ['required', 'string'],
            'rmobile' => ['required', 'string'],
            'raddress2' => ['required', 'string'],
            'raddress2' => ['required', 'string'],
            'rcity' => ['required', 'string'],
            'category' => ['required', 'string'],
            'goods_type' => ['required', 'string'],
            'packing_type' => ['required', 'string'],
            'qty' => ['required', 'string'],
            'unitQty' => ['required', 'string'],
            'unitWeight' => ['required', 'string'],
            'totalWeight' => ['required', 'string'],
            'rAble' => ['required', 'number'],
            'recived' => ['required', 'number'],
            'balance' => ['required', 'number'],
            
            
   		]);
   		if ($validator->fails()) {
            
            return Redirect::back()->withErrors($validator)->withInput();
        }
           
        $booking = new bookingform();
        $booking->service_type = $request->get('service_type');
        $booking->paymentMethod = $request->get('paymentMethod');
        $booking->date = $request->get('date');
        $booking->customer = $request->get('customer');
        $booking->status = $request->get('status');
        $booking->bookingNumber = $request->get('bookingNumber');
        $booking->city = $request->get('city');
        $booking->subcity = $request->get('subcity');
        $booking->wtc = $request->get('wtc');
        $booking->tkg = $request->get('tkg');
        $booking->tqty = $request->get('tqty');
        $booking->remarks = $request->get('remarks');
        $booking->depSender = $request->get('depSender');
        $booking->sname = $request->get('sname');
        $booking->scnic = $request->get('scnic');
        $booking->saddress = $request->get('saddress');
        $booking->smobile = $request->get('smobile');
        $booking->raddress2 = $request->get('saddress2');
        $booking->rsaddress2 = $request->get('sraddress2');
        $booking->rcity = $request->get('rcity');
        $booking->service_type = $request->get('service_type');
        $booking->category = $request->get('category');
        $booking->goods_type = $request->get('goods_type');
        $booking->packing_type = $request->get('packing_type');
        $booking->service_type = $request->get('service_type');
        $booking->qty = $request->get('qty');
        $booking->unitQty = $request->get('unitQty');
        $booking->unitWeight = $request->get('unitWeight');
        $booking->totalWeight = $request->get('totalWeight');
        $booking->rAble = $request->get('rAble');
        $booking->recived = $request->get('recived');
        $booking->balance = $request->get('balance');
      

        $booking->save();

        

        $success = 'Booking Created';
        return back()->with('success', $success);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customer_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'cnic' => ['required', 'string'],
            'logo' => 'image|nullable'
   		]);
   		if ($validator->fails()) {
            
            return Redirect::back()->withErrors($validator)->withInput();
        }
           
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->cnic = $request->get('cnic');
        $user->city = $request->get('city');
        $user->assignRole('customer');

        $user->save();

        //handle file upload
        if($request->hasFile('logo')){
            //get filename with extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('logo')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $company = new Company();
        $company->user_id = $user->id;
        $company->company_name = $request->get('company_name');
        $company->phone = $request->get('phone');
        $company->company_ntn = $request->get('company_ntn');
        $company->address = $request->get('address');
        $company->logo = $fileNameToStore;

        $company->save();

        $weights = $request->get('weight');
        $prices = $request->get('price');
        $tb_price = $request->get('tb_price');
        for($i = 0; $i <= $request->get('input'); $i++)
        {
            $weights1 = new Weights();
            $weights1->user_id = $user->id;
            $weights1->weight = $weights[$i];
            $weights1->price = $prices[$i];
            $weights1->tb_price = $tb_price[$i];

            $weights1->save();
        };

        // $weights->save();

        $success = 'Customer Created';
        return back()->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customer_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'cnic' => ['required', 'string'],
   		]);
   		if ($validator->fails()) {
            $error = 'validation faild';
   			return back()->with('success', $error);;
            }

        $customer = User::find($id);
        $customer->name = $request->get('name');
        $customer->email = $request->get('email');
        $customer->cnic = $request->get('cnic');
        $customer->city = $request->get('city');
        
        $customer->save();

        //handle file upload
        if($request->hasFile('logo')){
            //get filename with extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('logo')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $company = $customer->company;
        $company->user_id = $customer->id;
        $company->company_name = $request->get('company_name');
        $company->phone = $request->get('phone');
        $company->company_ntn = $request->get('company_ntn');
        $company->address = $request->get('address');
        $company->logo = $fileNameToStore;

        $customer->save();
        $company->save();

        $success = 'Customer Updated';
        return back()->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customer_destroy($id)
    {
        $customer = User::find($id);
		$customer->delete();
		
		$success = "Customer deleted";
        return back()->with('success', $success);
    }

    // For admin users

    public function admin_index()
    {
        $admins = User::role('admin')->get();
        return view('admin.admin.index')->with(compact('admins'));
    }

    public function admin_create()
    {
        return view('admin.admin.create');
    }

    public function admin_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'cnic' => ['required', 'string'],
   		]);
   		if ($validator->fails()) {
   			return back();
            }
           
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->cnic = $request->get('cnic');
        $user->city = $request->get('city');
        $user->assignRole('admin');

        $user->save();

        $success = 'Admin Created';
        return back()->with('success', $success);
    }


    public function admin_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'cnic' => ['required', 'string'],
   		]);
   		if ($validator->fails()) {
            $error = 'validation faild';
   			return back()->with('success', $error);;
            }

        $admin = User::find($id);
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->cnic = $request->get('cnic'); 
        $admin->city = $request->get('city');   
        $admin->save();

        $success = 'Admin Updated';
        return back()->with('success', $success);
    }

    public function admin_destroy($id)
    {
        $admin = User::find($id);
		$admin->delete();
		
		$success = "Admin deleted";
        return back()->with('success', $success);
    }

    // For operation users

    public function operation_index()
    {
        $operations = User::role('operation')->get();
        return view('admin.operation.index')->with(compact('operations'));
    }

    public function operation_create()
    {
        return view('admin.operation.create');
    }

    public function operation_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'cnic' => ['required', 'string'],
   		]);
   		if ($validator->fails()) {
   			return back();
            }
           
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->cnic = $request->get('cnic');
        $user->city = $request->get('city');
        $user->assignRole('operation');

        $user->save();

        $success = 'Operation Created';
        return back()->with('success', $success);
    }


    public function operation_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'cnic' => ['required', 'string'],
   		]);
   		if ($validator->fails()) {
            $error = 'validation faild';
   			return back()->with('success', $error);
            }

        $operation = User::find($id);
        $operation->name = $request->get('name');
        $operation->email = $request->get('email');
        $operation->cnic = $request->get('cnic');
        $operation->city = $request->get('city'); 
        $operation->save();

        $success = 'Operation Updated';
        return back()->with('success', $success);
    }

    public function operation_destroy($id)
    {
        $operation = User::find($id);
		$operation->delete();
		
		$success = "Operation deleted";
        return back()->with('success', $success);
    }

      // For account users

      public function account_index()
      {
          $accounts = User::role('account')->get();
          return view('admin.account.index')->with(compact('accounts'));
      }
  
      public function account_create()
      {
          return view('admin.account.create');
      }
  
      public function account_store(Request $request)
      {
          $validator = Validator::make($request->all(), [
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'password' => ['required', 'string', 'min:8'],
              'cnic' => ['required', 'string'],
             ]);
             if ($validator->fails()) {
                 return back();
              }
             
          $user = new User();
          $user->name = $request->get('name');
          $user->email = $request->get('email');
          $user->password = Hash::make($request->get('password'));
          $user->cnic = $request->get('cnic');
          $user->city = $request->get('city');
          $user->assignRole('account');
  
          $user->save();
  
          $success = 'Account Created';
          return back()->with('success', $success);
      }
  
  
      public function account_update(Request $request, $id)
      {
          $validator = Validator::make($request->all(), [
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
              'cnic' => ['required', 'string'],
             ]);
             if ($validator->fails()) {
              $error = 'validation faild';
                 return back()->with('success', $error);
              }
  
          $account = User::find($id);
          $account->name = $request->get('name');
          $account->email = $request->get('email');
          $account->cnic = $request->get('cnic');
          $account->city = $request->get('city'); 
          $account->save();
  
          $success = 'account Updated';
          return back()->with('success', $success);
      }
  
      public function account($id)
      {
          $account = User::find($id);
          $account->delete();
          
          $success = "account deleted";
          return back()->with('success', $success);
      }

    // For rider users

    public function rider_index()
    {
        $riders = User::role('rider')->get();
        return view('admin.rider.index')->with(compact('riders'));
    }

    public function rider_create()
    {
        return view('admin.rider.create');
    }

    public function rider_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'cnic' => ['required', 'string'],
   		]);
   		if ($validator->fails()) {
   			return back();
            }
           
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->cnic = $request->get('cnic');
        $user->city = $request->get('city');
        $user->assignRole('rider');

        $user->save();

        $success = 'Rider Created';
        return back()->with('success', $success);
    }


    public function rider_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'cnic' => ['required', 'string'],
   		]);
   		if ($validator->fails()) {
            $error = 'validation faild';
   			return back()->with('success', $error);;
            }

        $rider = User::find($id);
        $rider->name = $request->get('name');
        $rider->email = $request->get('email');
        $rider->cnic = $request->get('cnic');
        $rider->city = $request->get('city'); 
        $rider->save();

        $success = 'Rider Updated';
        return back()->with('success', $success);
    }

    public function rider_destroy($id)
    {
        $rider = User::find($id);
		$rider->delete();
		
		$success = "Operation deleted";
        return back()->with('success', $success);
    }

    // Changing password for a user
    public function change_password(Request $request, $id) {
        $user = User::find($id);
        $user->password = Hash::make($request->get('password'));

        $user->save();

        $success = "Password changed successfully";
        return back()->with('success', $success);
    }
     public function makeBarcode()
    { 
     

        return view('admin.account.generate_slips');  

        
    }


    public function storebarcode(Request $request)
    {  
       
        $keyvalue=[];   
        $number = $request->number;            
        

        for ($i=0; $i <=$number-1 ; $i++)
        {
            $consign_no = Settings::where('name', 'consign_no')->first()->value;
            $increment = $consign_no+1;
            $initial = date("Y");
            $consignment_no = $initial.$increment;
            $update_setting = Settings::where('name', 'consign_no')->first();
            $update_setting->value = $increment;
            $update_setting->save();
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            $barcode= $generator->getBarcode($consignment_no, $generator::TYPE_CODE_128);
            $data=new barcode; 
            $data->number=$consignment_no;
            $data->barcode=$barcode;
            $data->save();
            $value=[$data];
            array_push($keyvalue, $data);
            
        }
         $pdf = PDF::loadView('admin.account.export_pdf', ['keyvalue' => $keyvalue]);
         return $pdf->download('slips.pdf');
        
    return redirect()->back(); 


    }
    public function call(){

        $products=barcode::all(); 

        return view('admin.account.generate_slips',compact('products'));   
    }

}
