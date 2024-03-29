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

                                    <div class="col-md-6" id="div_email">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="div_error_email" style="text-align: center; color: red">
                                        </div>
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

                                <div id="div_error_api" style="text-align: center; color: red">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $("#form-register").submit(function(event) {

        event.preventDefault();
        var form = new FormData();
        form.append("name", $('#name').val());
        form.append("email", $('#email').val());
        form.append("password", $('#password').val());
        form.append("password_confirmation", $('#password-confirm').val());

        var settings = {
            "url": "/api/register",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Accept": "application/json"
            },
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "cache": false,
            "data": form,
            "dataType": "json",
            error: function(xhr){
                var error = JSON.parse(xhr.responseText);

                if(error.errors === undefined) {
                    error_api();
                }
                 else if(error.errors.email[0] === "The email has already been taken.") {
                    error_email();
                 }
            },
            success: function () {
                window.location.href = "/login";
            }
        };

        function error_email() {
            $("#div_error_email")[0].innerHTML +=
            '<span>Cette adresse email est déja utilisé</span>';
            const start = Date.now();

            setTimeout(() => {
                $("#div_error_email")[0].innerHTML = "";
            }, 3000);
        }

        function error_api() {
            $("#div_error_api")[0].innerHTML +=
                '<span>Nous sommes désolés, le serveur a rencontré un problème.</span>';
            const start = Date.now();

            setTimeout(() => {
                $("#div_error_api")[0].innerHTML = "";
            }, 3000);
        }

        $.ajax(settings).done(function (response) {
        });
    });

</script>
@endsection
