<?php

Route::view('contact-us', 'laracontact::contact');
Route::post('contact-us', 'Laracontact\Http\Controllers\ContactRequestController@store')->name('contact_us.store');
