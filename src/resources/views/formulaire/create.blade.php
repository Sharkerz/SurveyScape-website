@extends('layouts.app')

@section('content')

<link href="{{ asset('css/create_form.css') }}" rel="stylesheet">

<div class="container">
   
    <h1>Création d'un Formulaire</h1>
    <form enctype="multipart/form-data" action="{{ route('formulaires.store') }}" method="post">  
        @csrf
        <div class="Name_Form">
        <textarea class="NomFormulaire"  required name="name" data-rows="1" tabindex="0" placeholder="Nom du Formulaire"></textarea>
        </div>
        <label>Mettre une image en bannière: </label>
        <input type="file" name="image">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <label for="NomFormulaire">Début de la publication:</label>
        <input type="date" id="start" name="open_on" value="null" min="2020-01-01"></br>
        <label for="NomFormulaire">Fin de la publication:</label>
        <input type="date" id="start" name="close_on" value="null" min="2020-01-01">
        <input type="submit">
    </form>

</div>
@endsection

