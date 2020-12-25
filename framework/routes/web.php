<?php
// Route::get('/', 'FrontendController@index')->middleware('IsInstalled');

if (env('front_enable') == 'no') {
    Route::get('/', function () {
        return redirect('admin');
    })->middleware('IsInstalled');
} else {
    Route::get('/', 'FrontendController@index')->middleware('IsInstalled')->name('index');
    Route::get('/application-form', 'FrontendController@applicationForm')->middleware('IsInstalled')->name('application_form');

    Route::get('/correction-form', 'FrontendController@correctionForm')->middleware('IsInstalled')->name('correction_form');
    Route::post('/application-submit', 'ApplicationController@application')->middleware('IsInstalled')->name('application_submit');
    Route::get('/application_update', 'ApplicationController@application_update')->middleware('IsInstalled')->name('application_update');
    Route::post('/application_complete', 'ApplicationController@application_complete')->middleware('IsInstalled')->name('application_complete');
    Route::get('/check-status', 'ApplicationController@checkStatus')->middleware('IsInstalled')->name('check_status');
    Route::post('/verify', 'ApplicationController@verify')->middleware('IsInstalled')->name('verify');


    Route::get('/contact', 'ApplicationController@contact')->middleware('IsInstalled')->name('contact');
    Route::get('/sidebarDetails', 'ApplicationController@sidebarDetails')->middleware('IsInstalled')->name('sidebarDetails');
    Route::post('/correction-submit', 'CorrectionController@correction')->middleware('IsInstalled')->name('correction_submit');
    Route::get('/contact', 'ApplicationController@contact')->middleware('IsInstalled')->name('contact');

   Route::get('/bid-user', 'ApplicationController@bid_use')->middleware('IsInstalled')->name('bid_use');
   Route::get('/process_of_apply', 'ApplicationController@process_of_apply')->middleware('IsInstalled')->name('process_of_apply');
   Route::get('/information_supplier', 'ApplicationController@information_supplier')->middleware('IsInstalled')->name('information_supplier');
   Route::get('/b_d_registration_center', 'ApplicationController@b_d_registration_center')->middleware('IsInstalled')->name('b_d_registration_center');
   Route::get('/list_of_center', 'ApplicationController@list_of_center')->middleware('IsInstalled')->name('list_of_center');
   Route::get('/mrittuki', 'ApplicationController@mrittuki')->middleware('IsInstalled')->name('mrittuki');
   Route::get('/mrittuneed', 'ApplicationController@mrittuneed')->middleware('IsInstalled')->name('mrittuneed');
   Route::get('/mrittuapp', 'ApplicationController@mrittuapp')->middleware('IsInstalled')->name('mrittuapp');
   Route::get('/mrittuinf', 'ApplicationController@mrittuinf')->middleware('IsInstalled')->name('mrittuinf');
   Route::get('/gaget', 'ApplicationController@gaget')->middleware('IsInstalled')->name('gaget');
   Route::get('/press', 'ApplicationController@press')->middleware('IsInstalled')->name('press');
   Route::get('/faq', 'ApplicationController@faq')->middleware('IsInstalled')->name('faq');
   Route::get('/birthki', 'ApplicationController@birthki')->middleware('IsInstalled')->name('birthki');
}
