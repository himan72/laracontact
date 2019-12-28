<?php
return [
    /*
     * Set the url redirection after submitting the contact us form.
     */
    'redirectTo' => '/',

    /*
     * Array of emails that should receive the contact request
     */
    'notifiables' => ['admin@test.test'],

    /*
     * Set to false to disable sending emails feature
     */
    'send_mails' => true,

    'recaptcha' => [
        'recaptcha_secret' => env('RECAPTCHA_SECRET'),
        'recaptcha_sitekey' => env('RECAPTCHA_SITEKEY'),
    ]

];