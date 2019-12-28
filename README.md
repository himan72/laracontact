#Laracontact
__Laracontact__ is a Contact us form for your laravel applications with spam protection through Google reCaptcha V2. <br>
The package store a contact request with (name, email, subject and message) in the database and send it by email to admins.

## Installation
```sh
composer require omh/laracontact
```
- The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:
```php
'providers' => [
    // ...
    Laracontact\LaracontactServiceProvider::class,
];
```

- You should publish the migration and the `config/contact_request.php` config file with:

```sh
php artisan vendor:publish --tag="laracontact-migration"
php artisan vendor:publish --tag="laracontact-config"
```
- After the config and migration have been published and configured, you can create the `contact_requests` table by running the migration:
```sh
php artisan migrate
```
## Usage
The contact us form is availabe by default at `/contact-us` <br>
You can customize the form path on the config file.

## Default config file contents
```php
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
     * Array of emails that should receive the contact request
     */
    'notifiables' => ['admin@test.test'],

    /*
     * Set to false to disable sending emails feature
     */
    'send_mails' => true,

    /*
     * To configure correctly please visit https://developers.google.com    /recaptcha/docs/start
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
    ]

];
```
- You can change the redirection url after the contact submission
```php
    /*
     * Set the url redirection after submitting the contact us form.
     */
     'redirectTo' => '/my-custom-redirection',
```
- You can add admin's emails in the notifiables array 
```php
    /*
     *  Array of emails that should receive the contact request
     */
     'notifiables' => ['admin@test.test'],
```
- You can disable sending emails by setting the `'send_emails'` to false
```php
    /*
     * Set to false to disable sending emails feature
     */
    'send_mails' => false,
```
## Customize the Contact Us form
If you want to customize the contact us form you can run
```sh
php artisan vendor:publish --tag="laracontact-views"
```
The views will now be located in the `resources/views/vendor/contact_request/` directory
## Use your own Maillable/Notifiable
A `Laracontact\Events\ContactRequestEvent` event is fired each time a contact request is submitted. You can add listeners in your `app/Providers/EventServiceProvider.php` file and trigger your own maillable
```php
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Laracontact\Events\ContactRequestEvent::class => [
            // your own listeners
        ],
    ];
```