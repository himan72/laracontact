<?php
Route::group(['namespace' => 'Laracontact\Http\Controllers'], function() {
    Route::get('contact-us', 'ContactUsController@show')->name('contact-us.show');
    Route::post('contact-us', 'ContactUsController@store')->name('contact-us.store');
});

Route::view('contact-us', 'laracontact::contact');