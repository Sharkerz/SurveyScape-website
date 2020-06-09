@guest

@else
    @extends('layouts.app')

@endguest

@section('content')

    <link href="{{ asset('css/repondre.css') }}" rel="stylesheet">

    <div id="main_reponse" class="container-fluid">
        <h2>{{ $formulaire->name }}</h2>
    </div>

@endsection
