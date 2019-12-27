<?php

namespace Laracontact\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Laracontact\Models\ContactRequest;

class ContactRequestEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \Laracontact\Models\ContactRequest
     */
    protected $contact_request;

    /**
     * Create a new event instance.
     *
     * @param \Laracontact\Models\ContactRequest $contact_request
     */
    public function __construct(ContactRequest $contact_request)
    {
        $this->contact_request = $contact_request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
