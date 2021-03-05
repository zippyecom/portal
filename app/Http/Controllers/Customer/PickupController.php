<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Pickup;

class PickupController extends Controller
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
        $company = Auth::user()->company->id;
        $pickups = Pickup::where('company_id', $company)->get();

        return view('customer.pickups.index', with(compact('pickups')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pickup = New Pickup();
        $pickup->company_id = Auth::user()->company->id;
        $pickup->name = $request->get('name');
        $pickup->contact = $request->get('contact');
        $pickup->email = $request->get('email');
        $pickup->pickup_address = $request->get('pickup_address');

        $pickup->save();

        $success = "Pickup Location added";
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
    public function update(Request $request, $id)
    {
        $pickup = Pickup::find($id);
        $pickup->company_id = Auth::user()->company->id;
        $pickup->name = $request->get('name');
        $pickup->contact = $request->get('contact');
        $pickup->email = $request->get('email');
        $pickup->pickup_address = $request->get('pickup_address');

        $pickup->save();

        $success = "Pickup Location updated";
        return back()->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pickup = Pickup::find($id);
		$pickup->delete();
		
		$success = "Pickup Location deleted";
        return back()->with('success', $success);
    }
}
