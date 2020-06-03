@extends('layouts.app')

@section('content')

<link href="{{ asset('css/create_form.css') }}" rel="stylesheet">

<div class="container-sm">

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

    <div class="div_question">
        <form name="quest_1">
            <!-- Ligne titre + choix type -->
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control title_question" name="question" placeholder="Question numero 1" required>
                </div>
                <div class="col"></div>
                <div class="col-3">
                    <select class="form-control">
                        <option>Choix multiples</option>
                        <option>Texte</option>
                        <option>jsp²</option>
                    </select>
                </div>
            </div>

            <!-- Case reponses questions -->
            <div class="multipleChoice">
                <div class="choices">
                    <div class="row">
                        <div class="col-5">
                            <input type="text" class="form-control" placeholder="Choix 1" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <i class="material-icons add_option">add</i>
                </div>
            </div>

        </form>
    </div>

<script type="text/javascript" src="{{ URL::asset('js/create_form.js') }}"></script>

</div>
@endsection

