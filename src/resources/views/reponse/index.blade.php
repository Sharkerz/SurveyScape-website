@guest

@else
    @extends('layouts.app')

@endguest

@section('content')

    <link href="{{ asset('css/create_form.css') }}" rel="stylesheet">

    {{ $formulaire->name }}

@endsection
