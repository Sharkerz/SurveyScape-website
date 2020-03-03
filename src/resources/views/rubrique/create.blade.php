@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h1>Création d'un Formulaire</h1>
            </div>
                <form action="{{ route('rubriques.store') }}" method="post">  
                    @csrf
                    <label for="NomRubrique">Nom de la Rubrique:</label>
                    <input label="Nom de la Rubrique:" type="text" name="name" required></br>
                    <label for="NomRubrique">Nom du Formulaire associé :</label>
                    <div class="form-group">
                            <label for="formulaire" class="col-md-4 control-label">Formulaires :</label>
                            <div class="col-md-6">
                                <select name="formulaire" id="formulaire" class="form-control">
                                    @foreach($formulaire as $formulaire)
                                        <option value="{{ $formulaire->id }}">{{ $formulaire->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <input type="submit">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

