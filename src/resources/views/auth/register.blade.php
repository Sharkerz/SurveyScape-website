@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.Register') }}</div>

<<<<<<< HEAD
<<<<<<< HEAD
                <div class="card-body">
                    <form id="form-register" action="/api/register" method="post">
                        @csrf
=======
<div class="div-blanche">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('auth.Register') }}</div>
>>>>>>> 00e3d368b036fe481bcb20b692d294ae6687cb3c
=======
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
>>>>>>> 978b04ae81188602944555d144aff07441d23178

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

<<<<<<< HEAD
<<<<<<< HEAD
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btn-submit">
                                    {{ __('auth.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
                    <script>
                        $("#form-register").submit(function(event) {

                            /* stop form from submitting normally */
                            event.preventDefault();

                            /* get the action attribute from the <form action=""> element */
                            var $form = $( this ),url = $form.attr( 'action' );


                            /* Send the data using post with element id name and name2*/
                            var posting = $.post( url, { name: $('#name').val(), email: $('#email').val(), password: $('#password').val(), password_confirmation: $('#password-confirm').val() });
                        });

                        /* Alerts the results */
                        posting.done(function( data ) {
                            alert('test');
                        });
                        });

                    </script>

=======
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('auth.Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
>>>>>>> 00e3d368b036fe481bcb20b692d294ae6687cb3c
=======
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('auth.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
>>>>>>> 978b04ae81188602944555d144aff07441d23178
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
