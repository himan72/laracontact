<?php

namespace Laracontact\Tests\Feature;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Laracontact\Events\ContactRequestEvent;
use Laracontact\Mail\ContactRequestMail;
use Laracontact\Notifications\ContactRequestNotification;
use Laracontact\Tests\TestCase;

class ContactTest extends TestCase
{

    /**
     * @test
     */
    public function it_shows_the_contact_us_form()
    {
        $this->withoutExceptionHandling();
        $this->get('/contact-us')
            ->assertOk()
            ->assertSee('Contact us');
    }

    /**
     * @test
     */
    public function it_stores_the_contact_message_in_contact_requests_table()
    {

        $this->postContactRequest();
        $this->assertDatabaseHas('contact_requests', Arr::except($this->getData(), 'g-recaptcha-response'));
    }

    /**
         * @test
    */
    public function it_redirect_to_config_path()
    {
        $this->postContactRequest()
        ->assertRedirect('/thanks-message');

    }

    /**
         * @test
    */
    public function it_notifys_admins_on_contact_request()
    {
        Mail::fake();
        $this->postContactRequest();
        Mail::assertSent(ContactRequestMail::class, 3);

    }

    /**
         * @test
    */
    public function it_fires_an_event_on_contact_request()
    {
        Event::fake();

        $this->postContactRequest();
        
        Event::assertDispatched(ContactRequestEvent::class);

    }

    /**
     * @return array
     */
    protected function getData(): array
    {
        return[
            'name' => 'dummy_name',
            'email' => 'email@test.test',
            'subject' => 'dummy subject',
            'message' => 'dummy message',
            'g-recaptcha-response' => 'dummy key',
        ];
    }

    /**
     * @param null $data
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function postContactRequest($data = null)
    {
        return $this->post(route('contact_us.store'), $data ?? $this->getData());
    }
}