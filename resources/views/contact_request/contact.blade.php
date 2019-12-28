<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>{{ config('app.name')}} - {{config('contact_request.page_title')}}</title>


    <style>
        textarea {
            resize: none;
        }
        .form-label {
            font-size: 12px;
            color: #5e9bfc;
            margin: 0;
            display: block;
            opacity: 1;
            -webkit-transition: .333s ease top, .333s ease opacity;
            transition: .333s ease top, .333s ease opacity;
        }
        .form-control {
            border-radius: 0;
            border-color: #ccc;
            border-width: 0 0 2px 0;
            border-style: none none solid none;
            box-shadow: none;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #5e9bfc;
        }
        .js-hide-label {
            opacity: 0;
        }
        .js-unhighlight-label {
            color: #999
        }
        .btn-start-order {
            background: 0 0 #ffffff;
            border: 1px solid #2f323a;
            border-radius: 3px;
            color: #2f323a;
            font-family: "Raleway", sans-serif;
            font-size: 16px;
            line-height: inherit;
            margin: 30px 0;
            padding: 10px 50px;
            text-transform: uppercase;
            transition: all 0.25s ease 0s;
        }
        .btn-start-order:hover,.btn-start-order:active, .btn-start-order:focus {
            border-color: #5e9bfc;
            color: #5e9bfc;
        }
    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class=" container ">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>{{__('Contact us')}}</h2>
        </div>
    </div>
    <div class="row ">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
            <form id="contact-form" class="form" action="{{ route('contact_us.store') }}" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">{{__('Your Name')}}</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="{{__('Your name')}}"
                           value="{{ old('name') }}"
                           tabindex="1"
                           required
                           >
                    @error('name')
                    <span class="alert alert-danger mt-2 d-inline-block"> {{$message}} </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label class="form-label" for="email">{{__('Your Email')}}</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="{{__('Your Email')}}"
                           value="{{ old('email') }}"
                           tabindex="2"
                           required>
                        @error('email')
                    <span class="alert alert-danger mt-2 d-inline-block"> {{$message}} </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="subject">{{__('Subject')}}</label>
                    <input type="text"
                           class="form-control"
                           id="subject"
                           name="subject"
                           placeholder="{{__('Subject')}}"
                           value="{{ old('subject') }}"
                           tabindex="3"
                           required>
                        @error('subject')
                    <span class="alert alert-danger mt-2 d-inline-block"> {{$message}} </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="message">{{__('Message')}}</label>
                    <textarea rows="5"
                              cols="50"
                              name="message"
                              class="form-control"
                              id="message"
                              placeholder="{{__('Message...')}}"
                              tabindex="4"
                              required>
                        {{ old('message') }}
                    </textarea>
                        @error('message')
                    <span class="alert alert-danger mt-2 d-inline-block"> {{$message}} </span>
                        @enderror
                </div>
                @if(env('RECAPTCHA_SITEKEY'))
                    <div class="g-recaptcha"
                         data-sitekey="{{env('RECAPTCHA_SITEKEY')}}">
                    </div>
                        @error('g-recaptcha-response')
                    <span class="alert alert-danger mt-2 d-inline-block"> {{$message}} </span>
                        @enderror
                @endif
                <div class="text-center">
                    <button type="submit" class="btn btn-start-order">{{__('Send Message')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>