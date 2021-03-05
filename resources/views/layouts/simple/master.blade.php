<?php 
   $main_logo = App\Settings::where('name', 'main_logo')->first()->value;
   $icon = App\Settings::where('name', 'icon')->first()->value;
   $login_logo = App\Settings::where('name', 'login_logo')->first()->value;
   $footer_left = App\Settings::where('name', 'footer_left')->first()->value;
   $footer_right = App\Settings::where('name', 'footer_right')->first()->value;

   $noti_to_cust = App\Alert::where('to', Auth::user()->id)->
                              where('isRead', '0')->orderBy('created_at', 'desc')->take(5)->get();
   $noti_to_cust_count = App\Alert::where('to', Auth::user()->id)->
                                    where('isRead', '0')->count();

   $noti_to_admin = App\Alert::where('to', 'Support')->
                              where('isRead', '0')->orderBy('created_at', 'desc')->take(5)->get();
   $noti_to_admin_count = App\Alert::where('to', 'Support')->
                                    where('isRead', '0')->count();

   $admin_message_count = App\Shipment::where('status', 'Returned')
                                       ->whereNotNull('return_advice')
                                       ->where('return_advice_status', '0')
                                       ->count();

   $advice_noti = App\Shipment::where('status', 'Returned')
                                 ->where('user_id', Auth::user()->id)
                                 ->whereNull('return_advice')
                                 ->orderBy('created_at', 'desc')
                                 ->get();

   $advice_noti_count = App\Shipment::where('status', 'Returned')
                              ->where('user_id', Auth::user()->id)
                              ->whereNull('return_advice')
                              ->orderBy('created_at', 'desc')
                              ->count();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="/images/logos/{{$icon}}" type="image/x-icon">
      <link rel="shortcut icon"  href="/images/logos/{{$icon}}" type="image/x-icon">
      <title>@yield('title')</title>
      @include('layouts.simple.css')
      @yield('style')
      <style>
         .noti-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            /*line-height: 18px;
            max-height: 32px;*/
            -webkit-line-clamp: 1; /* Write the number of 
                                       lines you want to be 
                                       displayed */
            -webkit-box-orient: vertical;
         }
      </style>
   </head>
   <body>
      <!-- Loader starts-->
      <div class="loader-wrapper">
         <div class="theme-loader"></div>
      </div>
      <!-- Loader ends-->
      <!-- page-wrapper Start-->
      <div class="page-wrapper compact-wrapper" id="pageWrapper">
         <!-- Page Header Start-->
         @include('layouts.simple.header2')
         <!-- Page Header Ends -->
         <!-- Page Body Start-->
         <div class="page-body-wrapper ">
            <nav-menus></nav-menus>
            {{-- @include('layouts.simple.sidebar') --}}
            <!-- Page Sidebar Ends-->
            <div class="page-body" style="margin-left:0px">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col-lg-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{route('/')}}"><i class="f-16 fa fa-home"></i></a></li>
                              @yield('breadcrumb-items')
                           </ol>
                           @yield('breadcrumb-title')
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               @yield('content')
               <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            @include('layouts.simple.footer')
         </div>
      </div>
      @include('layouts.simple.script')
   </body>
</html>