@extends('layouts.app')

@section('content')
    <h1>Edition du formulaire</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <form action="{{ route('formulaires.update', ['formulaire' => $formulaire->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="text" name="name" value="{{ $formulaire->name }}">
                        <input type="datetime" name="open_on" value="{{ $formulaire->open_on }}">
                        <input type="datetime" name="close_on" value="{{ $formulaire->close_on }}">
                        <input type='submit' value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
