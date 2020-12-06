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
    Route::post('/application-submit', 'ApplicationController@application')->middleware('IsInstalled')->name('application');
    Route::get('/check-status', 'ApplicationController@checkStatus')->middleware('IsInstalled')->name('check_status');
    Route::post('/verify', 'ApplicationController@verify')->middleware('IsInstalled')->name('verify');
}
