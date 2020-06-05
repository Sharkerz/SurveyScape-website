@extends('layouts.app')

@section('content')

<link href="{{ asset('css/create_form.css') }}" rel="stylesheet">


<div class="container">

    <div id="Add_Form">
        <div id="Add_Question"><i class="material-icons"  id="btn-task" >add_circle_outline</i></div>
        <div id="Privacy"><i class="material-icons"  id="btn-task" >lock</i></div>
        <div id="Add_Banniere"><i class="material-icons"  id="btn-task" >image</i></div>
        <div id="Add_Dates"><i class="material-icons"  id="btn-task" >event</i></div>
    </div>

    <h1>Création d'un Formulaire</h1>
    <form enctype="multipart/form-data" action="{{ route('formulaires.store') }}" method="post">
        @csrf

        <div id="div_infos">
            <div class="Name_Form">
                <input class="NomFormulaire" type="text"  required name="name" data-rows="1" tabindex="0" placeholder="Nom du Formulaire">
            </div>
            <hr>
            <div class="row">
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
                        </div>

                        <!-- Case reponses questions -->
                        <div class="multipleChoice">
                            <input class="nb_choice" name="nb_choice" type="hidden" value="1"> <!-- Nombre de choix -->
                            <div class="choices">
                                <div class="row" id="choices">
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

    <div class="col" id="submit_form">
        <br><button type="submit" class="btn btn-primary btn-lg">Publier</button>
    </div>

</form>

<script type="text/javascript" src="{{ URL::asset('js/create_form.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/formBar.js') }}"></script>

</div>
@endsection

