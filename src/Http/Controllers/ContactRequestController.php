<?php

namespace Laracontact\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laracontact\Events\ContactRequestEvent;
use Laracontact\Mail\ContactRequestMail;
use Laracontact\Models\ContactRequest;

class ContactRequestController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $valid_data =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

       $contact_request =  ContactRequest::create($valid_data);

       if(config('contact_request.send_mails'))
        $this->sendMails($contact_request);

       event(new ContactRequestEvent($contact_request));

        return redirect(config('contact_request.redirectTo', '/'));
    }

    /**
     * send the contact request to notifiables
     * @param array $valid_data
     */
    protected function sendMails(ContactRequest $contact_request): void
    {
        $notifiables = collect(config('contact_request.notifiables'));

        $notifiables->each(function ($email) use ($contact_request) {
            Mail::to($email)->send(new ContactRequestMail($contact_request));
        });
    }
}
