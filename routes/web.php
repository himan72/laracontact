<?php
Route::group(['middleware' => ['web']], function () {
    Route::view('contact-us', 'laracontact::contact_request.contact');
    Route::post('contact-us', 'Laracontact\Http\Controllers\ContactRequestController@store')->name('contact_us.store');
});