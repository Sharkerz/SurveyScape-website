@extends('layouts.app')

@section('content')

<link href="{{ asset('css/list_form.css') }}" rel="stylesheet">

<div class="container-fluid" id="formulaire_list">

    <div id="header_list">
        <h2 class="header_title">Formulaires public disponibles</h2>
        <hr>
    </div>

    {{ $formulaires->links() }}

    @foreach($formulaires as $formulaire)


        <div class="card formulaire" id="{{ $formulaire->id }}">
                <img class="card-img-top" alt="Image_Formulaire" src="/Images/Formulaire/{{ $formulaire->image }}">
            <div class="card-body">
                <h2 class="card-title"> {{ $formulaire->name }} </h2>
                @if ($formulaire->close_on != NULL)
                    <p class="card-text"> Disponible jusqu'au {{ $formulaire->close_on }} </p>
                @else
                    <p class="card-text"> Pas de <br> date limite </p>
                @endif

                <div class="auteur">
                    {{ $formulaire->user->name }}
                    <img class="img_auteur" src="/avatar/{{$formulaire->user->avatar}}">
                </div>

            </div>
        </div>

    @endforeach

        {{ $formulaires->links() }}

</div>


@endsection
