<?php

namespace Laracontact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Laracontact\Models\ContactRequest;

class ContactRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \Laracontact\Models\ContactRequest
     */
    public $contact_request;

    /**
     * ContactRequestMail constructor.
     *
     * @param \Laracontact\Models\ContactRequest $contact_request
     */
    public function __construct(ContactRequest $contact_request)
    {
        $this->contact_request = $contact_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('laracontact::contact_request.emails.admin');
    }
}
