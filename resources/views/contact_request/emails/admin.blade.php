@component('mail::message')
    Dear Admin, <br>
    A new contact request was sent from: <br><br>
    **Name:** {{ $contact_request->name }} <br>
    **Email:** {{ $contact_request->email }} <br>
    **Subject**: {{ $contact_request->subject }} <br>
    **Message**: {{ $contact_request->message }} <br><br>
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
