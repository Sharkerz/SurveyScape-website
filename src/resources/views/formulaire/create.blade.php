@extends('layouts.app')

@section('content')

<link href="{{ asset('css/create_form.css') }}" rel="stylesheet">
<link href="{{ asset('css/index_form.css') }}" rel="stylesheet">

<div class="container">

    <div id="Add_Form">
        <div id="Add_Question"><i class="material-icons"  id="btn-task" id="icon_notif">add_circle_outline</i></div>
        <div id="Privacy"><i class="material-icons"  id="btn-task" id="icon_notif">lock</i></div>
        <div id="Add_Banniere"><i class="material-icons"  id="btn-task" id="icon_notif">image</i></div>
        <div id="Add_Dates"><i class="material-icons"  id="btn-task" id="icon_notif">event</i></div>
    </div>

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
        <br><input type="submit">

    <div id="questions">
        <div class="div_question">
            <input type='hidden' value='1'>
                    <div class="body_question">
                        <!-- Ligne titre + choix type -->
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control title_question" name="question" placeholder="Question" required>
                            </div>
                            <div class="col"></div>
                            <div class="col-3">
                                <select class="form-control select_type" name="type_question">
                                    <option value="Choix multiples"> Choix multiples</option>
                                    <option value="Texte"> Texte</option>
                                    <option>Soon</option>
                                </select>
                            </div>
                        </div>

                        <!-- Case reponses questions -->
                        <div class="multipleChoice">
                            <input class="nb_choice" name="nb_choice" type="hidden" value="2"> <!-- Nombre de choix -->
                            <div class="choices">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" name="1-1" class="form-control" placeholder="Choix 1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <i class="material-icons add_option">add</i>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="{{ URL::asset('js/create_form.js') }}"></script>

</div>
@endsection

