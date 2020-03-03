@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h1>Edition du formulaire : {{ $formulaire->name }}</h1>
            </div>
                <form action="{{ route('formulaires.update', ['formulaire' => $formulaire->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <label for="NomFormulaire">Nom du Formulaire:</label>
                    <input type="text" name="name" value="{{ $formulaire->name }}"  ></br>
                    <label for="NomFormulaire">Début de la publication:</label>
                    <input type="date" name="open_on" value="{{ $formulaire->open_on }}"  min="2020-01-01"></br>
                    <label for="NomFormulaire">Fin de la publication:</label>
                    <input type="date" name="close_on" value="{{ $formulaire->close_on }}" min="2020-01-01"></br>
                    <input type='submit' value="Modifier">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
