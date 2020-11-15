<?php

use Illuminate\Http\Request;
Route::namespace ('Api')->middleware(['throttle'])->group(function () {
	Route::post('/login', 'Auth@login')->name('login');
	Route::post('/user-registration', 'UsersApi@user_registration');
	Route::post('/user-login', 'UsersApi@user_login'); //without social media connected
	Route::post('/customer-login', 'UsersApi@customer_login'); //without social media connected
	Route::post('/user-login-sm', 'UsersApi@login_with_sm'); //login through social media
	Route::post('/forgot-password', 'UsersApi@forgot_password');
	Route::post('/get-settings', 'DriversApi@get_settings');
	Route::post('/codes', 'DriversApi@get_code');
});

	Route::get('/pickup-district', 'Api\UsersApi@picupDistrict')->name('picupDistrict');
	Route::get('/pickup-thana/{id}', 'Api\UsersApi@picupThana')->name('picup-thana');
	Route::get('/drop-district', 'Api\UsersApi@dropDistrict')->name('dropDistrict');
	Route::get('/drop-thana/{id}', 'Api\UsersApi@dropThana')->name('drop-thana');
	Route::post('/search-car-list', 'Api\UsersApi@searchCarList');
	Route::get('/wedding-package', 'Api\UsersApi@weddingPackage');
	Route::get('/package', 'Api\UsersApi@Package');
	Route::get('/guest-car', 'Api\UsersApi@guestCar');
	Route::post('/car-slot', 'Api\UsersApi@carSlot');
	Route::get('/colors', 'Api\UsersApi@colors');


Route::namespace ('Api')->middleware(['throttle', 'auth:api'])->group(function () {
  Route::post('/book', 'UsersApi@book');
  Route::post('/book-package', 'UsersApi@bookPackage');
  Route::post('/book-wedding-car', 'UsersApi@bookWedding');
  Route::post('/book-guest-car', 'UsersApi@bookGuestCar');
  Route::post('/book-guest-car-only', 'UsersApi@bookGuestCarOnly');
  Route::post('/user-profile', 'UsersApi@userProfile');
  // Route::post('/book-guest-test', 'UsersApi@bookGuestCarTest');
	Route::post('/ride-history', 'UsersApi@ride_history');
	Route::post('/edit-user-profile', 'UsersApi@edit_profile');
	Route::post('/update-user-profile', 'UsersApi@update_profile');
	Route::post('/change-password', 'UsersApi@change_password');
	Route::post('/message-us', 'UsersApi@message_us');
	Route::post('/book-now', 'UsersApi@book_now');
	Route::post('/book-later', 'UsersApi@book_later');
	Route::post('/update-destination', 'UsersApi@update_destination');
	Route::post('/review', 'UsersApi@review');
	Route::post('/user-single-ride', 'UsersApi@user_single_ride_info');
	Route::post('/get-reviews', 'UsersApi@get_reviews');
	Route::post('/user-logout', 'UsersApi@user_logout');
	Route::post('/change-availability', 'DriversApi@change_availability');
	Route::post('/ride-requests', 'DriversApi@ride_requests');
	Route::post('/single-ride-request', 'DriversApi@single_ride_request');
	Route::post('/accept-ride-request', 'DriversApi@accept_ride_request');
	Route::post('/cancel-ride-request', 'DriversApi@cancel_ride_request');
	Route::post('/reject-ride-request', 'DriversApi@reject_ride_request');
	Route::post('/driver-rides', 'DriversApi@driver_rides');
	Route::post('/single-ride-info', 'DriversApi@single_ride_info');
	Route::post('/start-ride', 'DriversApi@start_ride');
	Route::post('/destination-reached', 'DriversApi@destination_reached');
	Route::post('/confirm-payment', 'DriversApi@confirm_payment');
	Route::post('/active-drivers', 'DriversApi@active_drivers');

});

Route::middleware('auth:api')->post('/user', function (Request $request) {
	return $request->user();
});
