<?php

return [
    /*
     * Set the form path.
     */
    'form_path' => '/contact-us',

    /*
     * Set the url redirection after submitting the contact us form.
     */
    'redirectTo' => '/',

    /*
    * Set the contact us page title.
    */
    'page_title' => 'Contact us',

    /*
     * Array of emails that should receive the contact request
     */
    'notifiables' => ['admin@test.test'],

    /*
     * Set to false to disable sending emails feature
     */
    'send_mails' => true,

    /*
     * To configure correctly please visit https://developers.google.com/recaptcha/docs/start
     */
    'recaptcha' => [

        /*
         *
         * The secret key
         * get site key @ www.google.com/recaptcha/admin
         *
         */
        'recaptcha_secret' => env('RECAPTCHA_SECRET'),

        /*
         *
         * The secret key
         * get site key @ www.google.com/recaptcha/admin
         *
         */
        'recaptcha_sitekey' => env('RECAPTCHA_SITEKEY'),
    ],

];
