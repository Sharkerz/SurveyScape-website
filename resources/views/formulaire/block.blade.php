@extends('layouts.app')

@section('content')

<link href="{{ asset('css/reponse_success.css') }}" rel="stylesheet">

<div class="card" id="card_success">
    <h4 class="card-header">Page bloquée</h4>
    <div class="card-body">
        <p class="card-text">Vous n'avez pas accès à cette page</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Retourner à l'accueil</a>
    </div>
</div>

@endsection