<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Settings;
use App\Notification;
use App\Alert;

class SettingsController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
    
    public function show()
    {
        $main_logo = Settings::where('name', 'main_logo')->first()->value;
        $icon = Settings::where('name', 'icon')->first()->value;
        $login_logo = Settings::where('name', 'login_logo')->first()->value;
        $footer_left = Settings::where('name', 'footer_left')->first()->value;
        $footer_right = Settings::where('name', 'footer_right')->first()->value;
        
        return view('admin.settings', with(compact('main_logo', 'icon', 'login_logo', 'footer_left', 'footer_right')));
    }

    public function update_settings(Request $request)
    {
        //handle main_logo upload
        if($request->hasFile('main_logo')){
            //get filename with extension
            $filenameWithExt1 = $request->file('main_logo')->getClientOriginalName();
            //get just filename
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            //get just ext
            $extension1 = $request->file('main_logo')->getClientOriginalExtension();
            //file name to store
            $MLogoNameToStore = $filename1.'_'.time().'.'.$extension1;
            // upload image
            $path1 = $request->file('main_logo')->storeAs('public/logos', $MLogoNameToStore);

            $main_logo = Settings::where('name', 'main_logo')->first();
            $main_logo->value = $MLogoNameToStore;

            $main_logo->save();
        } else {
            $MLogoNameToStore = $request->get('main_logo_old');
        }

        //handle Website icon upload
        if($request->hasFile('icon')){
            //get filename with extension
            $filenameWithExt2 = $request->file('icon')->getClientOriginalName();
            //get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            //get just ext
            $extension2 = $request->file('icon')->getClientOriginalExtension();
            //file name to store
            $iconNameToStore = $filename2.'_'.time().'.'.$extension2;
            // upload image
            $path2 = $request->file('icon')->storeAs('public/logos', $iconNameToStore);

            $icon = Settings::where('name', 'icon')->first();
            $icon->value = $iconNameToStore;

            $icon->save();
        } else {
            $iconNameToStore = $request->get('icon_old');
        }

        //handle Website icon upload
        if($request->hasFile('login_logo')){
            //get filename with extension
            $filenameWithExt3 = $request->file('login_logo')->getClientOriginalName();
            //get just filename
            $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            //get just ext
            $extension3 = $request->file('login_logo')->getClientOriginalExtension();
            //file name to store
            $LlogoNameToStore = $filename3.'_'.time().'.'.$extension3;
            // upload image
            $path3 = $request->file('login_logo')->storeAs('public/logos', $LlogoNameToStore);

            $login_logo = Settings::where('name', 'login_logo')->first();
            $login_logo->value = $MLogoNameToStore;

            $login_logo->save();
        } else {
            $LlogoNameToStore = $request->get('login_logo_old');
        }

        $footer_left_text = $request->get('footer_left');
        $footer_right_text = $request->get('footer_right');

        $footer_left_save = Settings::where('name', 'footer_left')->first();
        $footer_left_save->value = $footer_left_text;
        $footer_left_save->save();
        
        $footer_right_save = Settings::where('name', 'footer_right')->first();
        $footer_right_save->value = $footer_right_text;
        $footer_right_save->save();

        $success = "Settings Updated";
        return back()->with('success', $success);
    }

    public function notifications_index()
    {
        $notifications = Notification::all();
        return view('admin.notifications', with(compact('notifications')));
    }

    public function notification_store(Request $request)
    {
        $notification = new Notification();
        $notification->text = $request->get('text');
        $notification->start_date = $request->get('start_date');
        $notification->end_date = $request->get('end_date');
        $notification->color = $request->get('color');

        $notification->save();
        
        $success = "Notification created";
        return back()->with('success', $success);
    }

    public function notification_destroy($id)
    {
        $notification = Notification::find($id);
		$notification->delete();
        
        $success = "Notification deleted";
        return back()->with('success', $success);
    }

    // notificaions !alerts
    public function all_notifications()
    {
        $customer_notifications = Alert::where('to', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        $admin_notifications = Alert::where('to', 'Support')->orderBy('created_at', 'desc')->get();

        return view('admin.all-notifications', with(compact('customer_notifications', 'admin_notifications')));
    }
}
