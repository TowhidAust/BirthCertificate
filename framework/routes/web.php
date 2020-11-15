<?php
// Route::get('/', 'FrontendController@index')->middleware('IsInstalled');

if (env('front_enable') == 'no') {
    Route::get('/', function () {
        return redirect('admin');
    })->middleware('IsInstalled');
} else {
    Route::get('/', 'FrontendController@index')->middleware('IsInstalled')->name('index');

}
