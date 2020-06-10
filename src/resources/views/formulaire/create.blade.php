@extends('layouts.app')

@section('content')

<link href="{{ asset('css/create_form.css') }}" rel="stylesheet">

<div id="back">
    <a href="javascript:window.history.go(-1)"><i id="back_logo" class="material-icons">arrow_back</i></a>
</div>

<div class="container">

    <div id="Add_Form">
        <div id="Add_Question"><i class="material-icons"  data-toggle="tooltip" data-placement="right" title="Ajouter une question" >add_circle_outline</i></div>
        <div id="Privacy"><i class="material-icons" id="btn-lock" data-toggle="tooltip" data-placement="right" title="Rendre le formulaire public" >lock</i></div>
        <div id="Add_Fond_Form"><i class="material-icons" id="btn-add_image_fond" data-toggle="tooltip" data-placement="right" title="Personnaliser le fond" >image</i></div>
        <form id="form_background" enctype="multipart/form-data" method="post">
            @csrf
            <input  hidden id="image_fond" type="file" name="image_fond_form">
        </form>
        <div id="Add_Dates"><i class="material-icons" >event</i></div>
    </div>

    <h1>Création d'un Formulaire</h1>
    <form enctype="multipart/form-data" action="{{ route('formulaires.store') }}" method="post">
        @csrf

        <!-- Public/privé -->
            <input type="hidden" value="1" name="private" id="private_value">

        <div id="div_infos">
            <div class="Name_Form">
                <input class="NomFormulaire" type="text"  required name="name" data-rows="1" tabindex="0" placeholder="Nom du Formulaire">
            </div>
            <hr>
            <div class="row persoL1">
                <div class="col">
                    <label>Mettre une image en bannière: </label>
                    <input type="file" name="image">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="enableDate">
                        <label class="form-check-label" for="enableDate">
                            Définir une date de début et de fin
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6"></div>
                <div id="div_Date" class="col" hidden>
                    <label for="NomFormulaire">Début de la publication:</label>
                    <input type="date" id="start_date" name="open_on" value="null" min="2020-01-01"></br>
                    <label for="NomFormulaire">Fin de la publication:</label>
                    <input type="date" id="end_date" name="close_on" value="null" min="2020-01-01">
                </div>
            </div>
        </div>


    <div id="questions">
        <div class="div_question">
            <input type='hidden' value='1'>
                    <div class="body_question">
                        <!-- Ligne titre + choix type -->
                        <div class="row">
                            <div class="col-6">
                                <input type='hidden' id='id_question' name='id_q1'  value='1' >
                                <input type="text" class="form-control title_question" name="q1" placeholder="Question 1" required>
                            </div>
                            <div class="col"></div>
                            <div class="col-3">
                                <select class="form-control select_type" name="typeq1">
                                    <option value="Choix multiples"> Choix multiples</option>
                                    <option value="Texte"> Texte</option>
                                    <option>Soon</option>
                                </select>
                            </div>
                            <div class="col-1"></div>
                        </div>

                        <!-- Case reponses questions -->
                        <div class="multipleChoice">
                            <input class="nb_choice" name="nb_choice" type="hidden" value="1"> <!-- Nombre de choix -->
                            <div class="choices">
                                <div class="row" id="choices">
                                    <div class="col-5">
                                        <input hidden  value="1-1" >
                                        <input type="text" name="1-1" class="form-control" placeholder="Choix 1" required>
                                    </div>
                                    <br><br>
                                </div>
                            </div>
                            <div class="row">
                                <i class="material-icons add_option">add</i>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

    <div class="col" id="submit_form">
        <br><button type="submit" class="btn btn-primary btn-lg">Publier</button>
    </div>

    <div id="background_create">
        <!-- div qui accueil le background si selectionné -->
    </div>

</form>

<script type="text/javascript" src="{{ URL::asset('js/create_form.js') }}"></script>

</div>
@endsection

