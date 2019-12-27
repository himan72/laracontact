<?php

namespace Laracontact\Tests\Feature;

use Laracontact\Tests\TestCase;

class ContactTest extends TestCase
{
    
    /**
         * @test
    */
    public function it_shows_the_contact_us_form()
    {
        $this->get('/contact-us')
            ->assertOk()
            ->assertSee('Contact us');
        
    }

}