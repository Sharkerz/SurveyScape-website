@extends('layouts.app')

@section('content')

<link href="{{ asset('css/reponse_success.css') }}" rel="stylesheet">

<div class="card" id="card_success">
    <h4 class="card-header">Succès</h4>
    <div class="card-body">
        <p class="card-text">Votre réponse au formulaire <b>{{ $formulaire_name }}</b> a bien été prise en compte</p>
        <a href="{{ route('listeFormulaire') }}" class="btn btn-primary">Retourner à la liste des formulaires</a>
    </div>
</div>

@endsection
