<?php
Auth::routes();
Route::namespace ('Admin')->group(function () {
    // Route::get('export-events', 'HomeController@export_calendar');

    Route::get("/clear_cache", function () {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
    });

    Route::get("/", 'HomeController@index')->middleware(['lang_check', 'auth']);
    Route::get('/application/{id}/view', 'ApplicationController@view_application');
    Route::get('/application/{id}/approve', 'ApplicationController@approve');
    Route::post('/application-reject', 'ApplicationController@reject')->name('reject');
    Route::post('/application-complete', 'ApplicationController@complete')->name('complete');
    Route::group(['middleware' => ['lang_check', 'auth', 'officeadmin']], function () {
        // Route::get('test', function () {
        //     return view('geocode');
        // });
        Route::get('/application', 'ApplicationController@index')->name('application');
        Route::get('/today-application', 'ApplicationController@today_application')->name('today_application');
        Route::get('/pending-application', 'ApplicationController@pending')->name('pending');

        Route::get('/councillor', 'CouncillorController@index')->name('councillor');
        Route::get('/councillor-create', 'CouncillorController@create')->name('councillor.create');
        Route::post('/councillor-store', 'CouncillorController@store')->name('councillor.store');
        Route::get("/councillor/enable/{id}", 'CouncillorController@enable');
        Route::get("/councillor/disable/{id}", 'CouncillorController@disable');
        Route::get("/councillor/{id}/edit", 'CouncillorController@edit');


        Route::post('clear-database', 'SettingsController@clear_database')->middleware('userpermission:S');
        Route::post('cancel-booking', 'BookingsController@cancel_booking');
        Route::resource('team', 'TeamController');
        Route::resource('company-services', 'CompanyServicesController')->middleware('userpermission:S');


        Route::get('frontend-settings', 'SettingsController@frontend')->middleware('userpermission:S');
        Route::post('frontend-settings', 'SettingsController@store_frontend');
        Route::resource('testimonials', 'TestimonialController')->middleware('userpermission:15');
        // routes for bulk delete action


        Route::get('reports/income', 'ReportsController@income')->middleware('userpermission:4');
        Route::post('reports/income', 'ReportsController@income_post')->middleware('userpermission:4');
        Route::post('print-income', 'ReportsController@income_print');

        Route::get('reports/expense', 'ReportsController@expense')->middleware('userpermission:4');
        Route::post('reports/expense', 'ReportsController@expense_post')->middleware('userpermission:4');
        Route::post('print-expense', 'ReportsController@expense_print');



        Route::get('api-settings', 'SettingsController@api_settings')->middleware('userpermission:S');
        Route::post('api-settings', 'SettingsController@store_settings')->middleware('userpermission:S');

        Route::get('fb', 'SettingsController@fb_create')->name('fb');
        Route::post('firebase-settings', 'SettingsController@firebase')->middleware('userpermission:S');
        Route::post('/income_records', 'Income@income_records')->middleware('userpermission:2');
        Route::post('/expense_records', 'ExpenseController@expense_records')->middleware('userpermission:2');
        Route::post('/store_insurance', 'VehiclesController@store_insurance');
        Route::get('vehicle/event/{id}', 'VehiclesController@view_event')->middleware('userpermission:1');
        Route::post('assignDriver', 'VehiclesController@assign_driver');
        Route::resource('/drivers', 'DriversController')->middleware('userpermission:0');
        Route::resource('/bookings', 'BookingsController')->middleware('userpermission:3');
        Route::post('/prev-address', 'BookingsController@prev_address');
        Route::get('print/{id}', 'BookingsController@print')->middleware('userpermission:3');
        Route::resource('/acquisition', 'AcquisitionController');
        Route::resource('/income', 'Income')->middleware('userpermission:2');
        Route::resource('/settings', 'SettingsController')->middleware('userpermission:S');
        Route::resource('/customers', 'CustomersController')->middleware('userpermission:0');
        Route::resource('/expense', 'ExpenseController')->middleware('userpermission:2');
        Route::resource('/expensecategories', 'ExpenseCategories')->middleware('userpermission:S');
        Route::resource('/incomecategories', 'IncomeCategories')->middleware('userpermission:S');


        Route::get("/reports/application", "ReportsController@application")->name("reports.application")->middleware('userpermission:4');
        Route::post("/reports/booking", "ReportsController@booking_post")->name("reports.booking")->middleware('userpermission:4');

        Route::get('/bookings/complete/{id}', 'BookingsController@complete')->middleware('userpermission:3');
        Route::get('/bookings/receipt/{id}', 'BookingsController@receipt')->middleware('userpermission:3');
        Route::get('/bookings/payment/{id}', 'BookingsController@payment')->middleware('userpermission:3');
        Route::get("/reports/monthly", "ReportsController@monthly")->name("reports.monthly")->middleware('userpermission:4');
        Route::get("/reports/vendors", "ReportsController@vendors")->name("reports.vendors")->middleware('userpermission:4');
        Route::post("/reports/vendors", "ReportsController@vendors_post")->name("reports.vendors")->middleware('userpermission:4');
        Route::get("reports/drivers", "ReportsController@drivers")->name("reports.drivers")->middleware('userpermission:4');
        Route::post("reports/drivers", "ReportsController@drivers_post")->name("reports.drivers")->middleware('userpermission:4');
        Route::get("reports/customers", "ReportsController@customers")->name("reports.customers")->middleware('userpermission:4');
        Route::post("reports/customers", "ReportsController@customers_post")->name("reports.customers")->middleware('userpermission:4');
        Route::get("/reports/delinquent", "ReportsController@delinquent")->name("reports.delinquent")->middleware('userpermission:4');
        Route::get("/reports/users", "ReportsController@users")->name("reports.users")->middleware('userpermission:4');
        Route::post("/reports/users", "ReportsController@users_post")->name("reports.users")->middleware('userpermission:4');
        Route::get('/calendar', 'BookingsController@calendar');
        Route::post("/reports/fuel", "ReportsController@fuel_post")->name("reports.fuel")->middleware('userpermission:4');
        Route::get("/reports/fuel", "ReportsController@fuel")->name("reports.fuel")->middleware('userpermission:4');
        Route::get("/reports/yearly", "ReportsController@yearly")->name("reports.yearly")->middleware('userpermission:4');
        Route::post("/reports/yearly", "ReportsController@yearly_post")->name("reports.yearly")->middleware('userpermission:4');

        Route::post('/customer/ajax_save', 'CustomersController@ajax_store')->name('customers.ajax_store');
        Route::get("/bookings_calendar", 'BookingsController@calendar_view')->name("bookings.calendar")->middleware('userpermission:3');
        Route::get('/calendar/event/calendar/{id}', 'BookingsController@calendar_event');
        Route::get('/calendar/event/service/{id}', 'BookingsController@service_view');
        Route::get('/calendar', 'BookingsController@calendar');
        Route::post('/get_driver', 'BookingsController@get_driver');
        Route::post('/get_vehicle', 'BookingsController@get_vehicle');
        Route::post('/fare', 'BookingsController@fare');
        Route::post('/bookings/complete', 'BookingsController@complete_post')->name("bookings.complete");
        Route::get('/bookings/complete', 'BookingsController@complete_post')->name("bookings.complete")->middleware('userpermission:3');

        Route::post("/reports/monthly", "ReportsController@monthly_post")->name("reports.monthly")->middleware('userpermission:4');
        Route::post("/reports/booking", "ReportsController@booking_post")->name("reports.booking")->middleware('userpermission:4');
        Route::post("/reports/delinquent", "ReportsController@delinquent_post")->name("reports.delinquent")->middleware('userpermission:4');
        Route::get("/send-email", "SettingsController@send_email")->middleware('userpermission:S');
        Route::post("/email-settings", "SettingsController@email_settings")->middleware('userpermission:S');
        Route::post('enable-mail', 'SettingsController@enable_mail')->middleware('userpermission:S');
        Route::get("/set-email", "SettingsController@set_email")->middleware('userpermission:S');
        Route::post("/set-content/{type}", "SettingsController@set_content")->middleware('userpermission:S');
        Route::get('ajax-api-store/{api}', 'SettingsController@ajax_api_store');
        Route::get('payment-settings', 'SettingsController@payment_settings');
        Route::post('payment-settings', 'SettingsController@payment_settings_post');
    });

    Route::group(['middleware' => ['lang_check', 'auth']], function () {
        Route::get('/vehicle_notification/{type}', 'NotificationController@vehicle_notification');
        Route::resource('/notes', 'NotesController')->middleware('userpermission:8');
        Route::get('driver_notification/{type}', 'NotificationController@driver_notification');
        Route::get('/my_bookings', 'DriversController@my_bookings')->name('my_bookings');

       // driver reports
        Route::get("/driver-reports/yearly", "DriversController@yearly")->name("dreports.yearly");
        Route::post("/driver-reports/yearly", "DriversController@yearly_post")->name("dreports.yearly");
        Route::get("/driver-reports/monthly", "DriversController@monthly")->name("dreports.monthly");
        Route::post("/driver-reports/monthly", "DriversController@monthly_post")->name("dreports.monthly");
        Route::get('/addresses', 'AddressController@index');

        Route::resource('/cancel-reason', 'ReasonController')->middleware('userpermission:3');
    });

    Route::group(['middleware' => ['lang_check', 'auth', 'superadmin']], function () {
        Route::resource('/users', 'UsersController')->middleware('userpermission:0');
    });
});
