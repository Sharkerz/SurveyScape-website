@extends('layouts.app')

@section('content')
<div class="div-blanche">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('auth.Register') }}</div>
                        <div class="card-body">
                            <form id="form-register" action="/api/register" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('auth.Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button class="btn btn-primary" id="btn-submit" action="{{ route('formulaires.index') }}">
                                            {{ __('auth.Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
<script>
      $(document).ready(function()
    {
    $("#form-register").submit(function(event) {
        
        /* stop form from submitting normally */
        event.preventDefault();

        /* get the action attribute from the <form action=""> element */
        var $form = $( this ),url = $form.attr( 'action' );
        console.log($('#name').val());

        var formdata = $('#form-register').serialize();
        var settings = {
        "url": "/api/register",
        "method": "POST",
        "timeout": 0,
        "cache": false,
        "headers": {
            "Accept": "application/json",
        },
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": formdata,
        "dataType": "json",
        success: function (data) {
            return data;
            }
        };
        
        $.ajax(settings)
    }),


        /* Send the data using post with element id name and name2*/
       // var posting = $.post( url, { name: $('#name').val(), email: $('#email').val(), password: $('#password').val(), password_confirmation: $('#password-confirm').val() });
   // });

    /* Alerts the results */
  /*  posting.done(function( data ) {
        alert('test');*/
    });


                    </script>
@endsection
