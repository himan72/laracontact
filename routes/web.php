<?php

Route::group(['middleware' => ['web']], function () {
    Route::view(config('contact_request.form_path', 'contact-us'), 'laracontact::contact_request.contact');
    Route::post(config('contact_request.form_path', 'contact-us'),
        'Laracontact\Http\Controllers\ContactRequestController@store')->name('contact_us.store');
});
