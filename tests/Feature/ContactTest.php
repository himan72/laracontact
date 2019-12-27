<?php

namespace Laracontact\Tests\Feature;

use Laracontact\Tests\TestCase;

class ContactTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('vendor:publish', ['--tag' => 'Laracontact\LaracontactServiceProvider'])->run();
        $this->artisan('migrate')->run();
    }

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
        $data = $this->getData();

        $this->post(route('contact_us.store'), $data);

        $this->assertDatabaseHas('contact_requests', $data);
    }

    /**
         * @test
    */
    public function it_redirect_to_config_path()
    {
        $data = $this->getData();

        $resp = $this->post(route('contact_us.store'), $data)
        ->assertRedirect('/thanks-message');

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
        ];
    }
}