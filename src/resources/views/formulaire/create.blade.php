@extends('layouts.app')

@section('content')
<h1>Création d'un formulaire</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('formulaires.store') }}" method="post">  
                    @csrf
                    <label for="NomFormulaire">Nom du Formulaire:</label>
                    <input label="Nom du Formulaire:" type="text" name="name" required></br>
                    <label for="NomFormulaire">Début de la publication:</label>
                    <input type="date" id="start" name="open_on" value="null" max="2020-12-31"></br>
                    <label for="NomFormulaire">Fin de la publication:</label>
                    <input type="date" id="start" name="close_on" value="null" min="start_formulaire" max="2020-12-31">
                    <input type="submit">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

