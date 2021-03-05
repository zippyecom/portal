<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

// Route::get('dummy', 'Admin\AdminController@index');


Route::group(['middleware' => ['role:admin|operation']], function () {
    Route::prefix('settings')->group(function () {
        Route::get('/notifications', 'Admin\SettingsController@notifications_index')->name('notifications');
        Route::post('/notifications-create', 'Admin\SettingsController@notification_store')->name('notifications.create');
        Route::get('/notifications/{id}', 'Admin\SettingsController@notification_destroy')->name('notifications.delete');
    
        Route::get('/settings', 'Admin\SettingsController@show')->name('settings');
        Route::post('/settings-update', 'Admin\SettingsController@update_settings')->name('settings.update');
    });
});

Route::get('/all-notifications', 'Admin\SettingsController@all_notifications')->name('all-notifications');

Route::get('profile', 'Admin\UserController@profile')->name('profile');
Route::post('cahnge-password/{id}', 'Admin\UserController@change_password')->name('change-password');

Route::get('/shipment/cn/{id}', 'Customer\ShipmentController@print_cn')->name('cn');

Route::get('/dashboard', 'Admin\AdminController@index')->name('index');

Route::group(['middleware' => ['role:customer']], function () {
    Route::get('/customer-shipments', 'Customer\ShipmentController@customer_shipments')->name('customer-shipments');
});

Route::get('/tracking/{cn}', 'Customer\ShipmentController@shipment_tracking_qr')->name('shipment-tracking-qr');
Route::get('reports', 'Customer\ShipmentController@reports')->name('reports');
Route::post('pdf/{key}', 'Customer\ShipmentController@reports_generate')->name('reports-generate');

Route::group(['middleware' => ['role:admin|operation']], function () {
    Route::get('reports', 'Customer\ShipmentController@reports')->name('reports');
    Route::post('pdf/{reportKey}', 'Customer\ShipmentController@reports_generate')->name('reports-generate');
});

Route::get('shipment-reports', 'Customer\ShipmentController@customer_reports')->name('customer.reports');
Route::post('cust-pdf/{reportKey}', 'Customer\ShipmentController@customer_reports_generate')->name('cust.reports-generate');


Route::get('shipByStation/{station}', 'Admin\AdminController@shipByStation')->name('shipByStation');

Route::group(['middleware' => ['role:customer']], function () {
    Route::get('/customer-shipments', 'Customer\ShipmentController@customer_shipments')->name('customer-shipments');
    
});

Route::group(['middleware' => ['role:admin|operation']], function () {
    Route::get('/booked-scan', function(){
        return view('admin/scan-booked-shipment');
    })->name('booked-scan');
    
});

Route::group(['middleware' => ['role:admin|account']], function () {
   
    Route::get('/collectionform', 'Admin\AdminController@collect_sheets_index')->name('collection');
    
});



Route::get('/sheetShipment_search/{data}', 'Customer\ShipmentController@sheetShipment_search')->name('sheetShipment_search');
Route::post('/collectstore', 'Customer\ShipmentController@storecollect')->name('collect');



Route::get('/barcode-search/{data}', 'Customer\ShipmentController@barcode_search')->name('barcode-search');
Route::get('/shipment-tracking/{id}', 'Customer\ShipmentController@shipment_tracking')->name('shipment-tracking');

// void for return & delivered shipments
Route::get('/void-arrived/{id}', 'Customer\ShipmentController@void_arrived')->name('void.arrived');
Route::get('/void-inTransit/{id}', 'Customer\ShipmentController@void_inTransit')->name('void.inTransit');
Route::get('/void-delivered/{id}', 'Customer\ShipmentController@void_delivered')->name('void.delivered');


Route::get('/shipment-cancel/{id}', 'Customer\ShipmentController@shipment_cancel')->name('shipment-cancel');
Route::post('/shipment/comments', 'Customer\ShipmentController@shipment_returned_comment')->name('shipment-comments');

Route::post('/bulk-add', 'Customer\ShipmentController@bulk_shipment_add')->name('bulk.add');

Route::group(['middleware' => ['role:admin|operation']], function () {
    Route::prefix('advices')->group(function () {
        Route::get('not-done', 'Customer\ShipmentController@notdone_advices')->name('notdone');
        Route::get('done', 'Customer\ShipmentController@done_advices')->name('done');
        Route::get('advice-status-update/{id}', 'Customer\ShipmentController@return_advice_status_update')->name('advice.status.update');
        Route::get('advice-reminder/{id}', 'Customer\ShipmentController@return_advice_reminder')->name('advice.reminder');
    });
});

Route::prefix('c-advices')->group(function () {
    Route::get('not-done', 'Customer\ShipmentController@customer_notdone_advices')->name('customer.notdone');
    Route::get('done', 'Customer\ShipmentController@customer_done_advices')->name('customer.done');
    Route::get('advice-status-update/{id}', 'Customer\ShipmentController@return_advice_status_update')->name('advice.status.update');
    Route::get('advice-reminder/{id}', 'Customer\ShipmentController@return_advice_reminder')->name('advice.reminder');
});

Route::group(['middleware' => ['role:admin|operation|rider|account']], function () {
    Route::prefix('generate')->group(function () {
        Route::get('delivery-sheets', 'Admin\AdminController@delivery_sheets_index')->name('sheets.index');
        Route::post('store-sheet', 'Admin\AdminController@delivery_sheet_store')->name('sheet.store');
        Route::get('store-sheet/{id}', 'Admin\AdminController@delivery_sheet_destroy')->name('sheet.delete');
    
        Route::get('ph2-sheets', 'Admin\AdminController@ph2_sheets_index')->name('ph2.index');
   

    });
    Route::get('/delivery-sheet-print/{id}', 'Admin\AdminController@delivery_sheet_print')->name('delivery-sheet-print');
    Route::get('/shipment-record/{id}', 'Admin\AdminController@delivery_sheet_details')->name('shipment-record');
    Route::get('/shipment-record-delete/{id}', 'Admin\AdminController@shipment_sheet_destroy')->name('shipment-record-delete');
   
    // ph2 shipments
    Route::get('/ph2-shipment-record/{id}', 'Admin\AdminController@ph2_delivery_sheet_details')->name('ph2-shipment-record');
    // Route::get('/ph2-shipments-cod-record/{id}', 'Admin\AdminController@collect_delivery_sheet_details')->name('cod-shipment-record');
    Route::post('/ph2-status-update', 'Admin\AdminController@ph2_status_update')->name('ph2-status-update');
    
});


// Shipment advice
Route::get('shipment-advice/{id}', 'Customer\ShipmentController@shipment_advice')->name('shipment.advice');
Route::post('advice-store/{id}', 'Customer\ShipmentController@shipment_advice_store')->name('advice.store');


Route::prefix('shipment')->group(function () {
    Route::get('index', 'Customer\ShipmentController@index')->name('shipments.index');
    Route::get('new', 'Customer\ShipmentController@new_shipments')->name('shipments.new');
    Route::get('arrived', 'Customer\ShipmentController@arrived_shipments')->name('shipments.arrived');
    Route::get('in-transit', 'Customer\ShipmentController@in_transit_shipments')->name('shipments.in-transit');
    Route::get('delivered', 'Customer\ShipmentController@delivered_shipments')->name('shipments.delivered');
    Route::get('returned', 'Customer\ShipmentController@returned_shipments')->name('shipments.returned');
    Route::get('create', 'Customer\ShipmentController@create')->name('shipments.create');
    Route::post('store', 'Customer\ShipmentController@store')->name('shipment.store');
    Route::post('update/{id}', 'Customer\ShipmentController@update')->name('shipments.update');
    Route::get('delete/{id}', 'Customer\ShipmentController@delete')->name('shipments.delete');
});


Route::prefix('accounts')->group(function() {
    Route::get('pickup-locations', 'Customer\PickupController@index')->name('pickups.index');
    Route::get('services', 'Customer\ShipmentController@services')->name('services');
});

Route::post('/store-location', 'Customer\PickupController@store')->name('location');
Route::post('/update-location/{id}', 'Customer\PickupController@update')->name('pickups.update');
Route::get('delete/{id}', 'Customer\PickupController@destroy')->name('pickups.delete');


Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('customer')->group(function () {
        Route::get('index', 'Admin\UserController@customer_index')->name('customer.index');
        Route::get('create', 'Admin\UserController@customer_create')->name('customer.create');
        Route::post('customer_store', 'Admin\UserController@customer_store')->name('customer.store');
        // Route::get('bookingform', 'Admin\UserController@customer_bookingform')->name('customer.bookingform');
        Route::post('{id}/update', 'Admin\UserController@customer_update')->name('customer.update');
        Route::get('delete/{id}', 'Admin\UserController@customer_destroy')->name('customer.delete');
        // Route::get('customer_bookingform', 'Admin\UserController@customer_bookingform')->name('customer.bookingform');
        // Route::get('subcity/get/{id}', 'Admin\UserController@getSubcities');
        // Route::get('customer_bookingform','Admin\UserController@city')->name('customer.bookingform');
        // Route::get('customer_bookingform','Admin\UserController@service')->name('customer.bookingform');
        // Route::post('store', 'Admin\UserController@booking_store')->name('booking.store');
        //Route::get('subcity/get/{id}', 'Admin\UserController@getSubcities');
        // Route::get('customer_bookingform','Admin\UserController@service')->name('customer.bookingform');
        // Route::post('store', 'Admin\UserController@booking_store')->name('booking.store');
        // Route::get('bookingform','Admin\AdminCUserController@sub_city')->name('customer.bookingform');
        // Route::get('bookingform','Admin\UserController@packing_type')->name('customer.bookingform');
        // Route::get('bookingform','Admin\UserController@goods_type')->name('customer.bookingform');
    });

    Route::prefix('admin')->group(function () {
        Route::get('index', 'Admin\UserController@admin_index')->name('admin.index');
        Route::get('create', 'Admin\UserController@admin_create')->name('admin.create');
        Route::post('store', 'Admin\UserController@admin_store')->name('admin.store');
        Route::post('{id}/update', 'Admin\UserController@admin_update')->name('admin.update');
        Route::get('delete/{id}', 'Admin\UserController@admin_destroy')->name('admin.delete');
        // Route::get('bookingform', 'Admin\UserController@customer_bookingform')->name('admin.bookingform');
        // Route::get('bookingform','Admin\UserController@service')->name('customer.bookingform');
        // Route::get('bookingform','Admin\UserController@city')->name('customer.bookingform');
        // Route::get('bookingform','Admin\UserController@sub_city')->name('customer.bookingform');
        // Route::get('bookingform','Admin\UserController@packing_type')->name('customer.bookingform');
        // Route::get('bookingform','Admin\UserController@goods_type')->name('customer.bookingform');
    });

    Route::prefix('operation')->group(function () {
        Route::get('index', 'Admin\UserController@operation_index')->name('operation.index');
        Route::get('create', 'Admin\UserController@operation_create')->name('operation.create');
        Route::post('store', 'Admin\UserController@operation_store')->name('operation.store');
        Route::post('{id}/update', 'Admin\UserController@operation_update')->name('operation.update');
        Route::get('delete/{id}', 'Admin\UserController@operation_destroy')->name('operation.delete');
        // Route::get('customer_bookingform','Admin\UserController@service')->name('customer.bookingform');
        // Route::post('store', 'Admin\UserController@booking_store')->name('booking.store');
        // Route::get('subcity/get/{id}', 'Admin\UserController@getSubcities');
       
    });

    Route::prefix('account')->group(function () {
        Route::get('index', 'Admin\UserController@account_index')->name('account.index');
        Route::get('create', 'Admin\UserController@account_create')->name('account.create');
        Route::post('store', 'Admin\UserController@account_store')->name('account.store');
        Route::post('{id}/update', 'Admin\UserController@account_update')->name('account.update');
        Route::get('delete/{id}', 'Admin\UserController@account_destroy')->name('account.delete');
      
    });
    
    
    Route::prefix('rider')->group(function () {
        Route::get('index', 'Admin\UserController@rider_index')->name('rider.index');
        Route::get('create', 'Admin\UserController@rider_create')->name('rider.create');
        Route::post('store', 'Admin\UserController@rider_store')->name('rider.store');
        Route::post('{id}/update', 'Admin\UserController@rider_update')->name('rider.update');
        Route::get('delete/{id}', 'Admin\UserController@rider_destroy')->name('rider.delete');
    });
});

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

Route::get('/home', function () {
    return redirect()->route('index');
})->name('/home');

Route::group(['middleware' => ['role:operation']], function () {
 
    Route::get('customer_bookingform','Admin\UserController@service')->name('customer.bookingform');
    Route::post('store', 'Admin\UserController@booking_store')->name('booking.store');
    Route::get('subcity/get/{id}', 'Admin\UserController@getSubcities');
   
});
Route::group(['middleware' => ['role:account']], function () {
Route::get('generateslips','Admin\UserController@makeBarcode')->name('account.generateslips');
Route::post('storebarcode','Admin\UserController@storebarcode');
});

Route::group(['middleware' => ['role:metro']], function () {
  
    });