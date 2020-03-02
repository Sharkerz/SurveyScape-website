@extends('layouts.app')

@section('content')
<h1>Création d'un formulaire</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="post">
                <label for="NomFormulaire">Nom du Formulaire:</label>
                    <input label="Nom du Formulaire:" type="text" name="test"></br>
                    <input type="text" name="test"></br>
                    <input type="submit">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

