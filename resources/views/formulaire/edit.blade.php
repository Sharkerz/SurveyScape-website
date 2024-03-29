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
        <div id="Add_Fond_Form"><i class="material-icons" data-toggle="tooltip" id="btn-add_image_fond" data-placement="right" title="Personnaliser le fond" >image</i></div>
        <form id="form_background" enctype="multipart/form-data" method="post">
            @csrf
            <input  hidden id="image_fond" type="file" name="image_fond_form">
        </form>
    </div>

    <h1>Edition du formulaire : </h1>

    <form  enctype="multipart/form-data" action="{{ route('update_form') }}" method="post">
            @csrf

        <!-- Public/privé -->
        <input type="hidden" value="{{$formulaire->private}}" name="private" id="private_value">

        <div id="div_infos">
            <div class="Name_Form">
                <input type="hidden" name="id" value="{{$formulaire->id}}">
                <input class="NomFormulaire" type="text"  required name="name" maxlength="39" data-rows="1" tabindex="0" value="{{$formulaire->name}}" placeholder="Nom du Formulaire">
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
                    <input type="date" id="start_date" name="open_on" value="{{$formulaire->open_on}}" min="2020-01-01"></br>
                    <label for="NomFormulaire">Fin de la publication:</label>
                    <input type="date" id="end_date" name="close_on" value="{{$formulaire->close_on}}" min="2020-01-01">
                </div>
            </div>

            <div class="row">
                <div class="col-9">
                </div>
                <div class="col-2" id="status_private" data-toggle="tooltip" data-placement="top" title="Les formulaires publics sont indexés sur le site. S'ils sont privés, il n'est possible d'y répondre qu'en possession du lien de partage">
                    <span>Formulaire</span> <span id="status_private_word">privé</span>
                </div>

            </div>

        </div>

    <div id="questions">
    @php
    $nb_question=1
    @endphp
    @foreach($questions as $question)

        <div class="div_question">
                <input type='hidden' value='{{$nb_question}}'>
                        <div class="body_question">
                            <!-- Ligne titre + choix type -->
                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" id="id_question" name="id_q{{$nb_question}}"  value="{{$question->id}}" >
                                    <input type="text" class="form-control title_question" name="q{{$nb_question}}" value="{{$question->name}}" required>
                                </div>
                                <div class="col"></div>
                                @if($question->type_question == "Choix multiples")
                                <div class="col-3">
                                    <select class="form-control select_type" name="typeq{{$nb_question}}">
                                    <option value="Choix multiples"selected> {{$question->type_question}}</option>
                                        <option value="Texte"> Texte</option>
                                    </select>
                                </div>
                                <div class="col-1">
                                <i class="material-icons delete_question">clear</i>
                                </div>

                            </div>
                            <div class="multipleChoice">
                                        <input class="nb_choice" name="nb_choice" type="hidden" value="1"> <!-- Nombre de choix -->
                                        <div class="choices">
                                        @foreach($choix_question_multiples as $choix_question_multiple)
                                            @php
                                            $nb_choix=1
                                            @endphp
                                            @foreach($choix_question_multiple as $choix_question)

                                            @if($choix_question->questions_id == $question->id)
                                            <div class="row">
                                                <div class="col-5">
                                                <input type="hidden" name="choix_question{{$nb_question}}-{{$nb_choix}}"  value="{{$choix_question->id}}">
                                                <input type="text" name="{{$nb_question}}-{{$nb_choix}}" class="form-control" value="{{$choix_question->name}}" required>

                                                </div>
                                                <div class="col-1">
                                                    <i class="material-icons delete_choice">clear</i>
                                                </div>

                                            </div>
                                            @php
                                            $nb_choix+=1
                                            @endphp
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <i class="material-icons add_option">add</i>
                                        </div>
                                    </div>
                                </div>

                                @else($question->type_question == "Texte")
                                <div class="col-3">
                                    <select class="form-control select_type" name="typeq{{$nb_question}}">
                                    <option value="Texte"selected> {{$question->type_question}}</option>
                                        <option value="Choix multiples"> Choix multiples</option>
                                        <option>Soon</option>
                                    </select>
                                </div>
                                <div class="col-1">
                                    <i class="material-icons delete_question">clear</i>
                                </div>
                                </div>
                                     <!-- Case reponses questions -->
                                    <div class="multipleChoice">
                                        <div class="choices">
                                            <div class="row">
                                                <div class="col-5">
                                                    <input id="disabledTextInput" type="text" class="form-control" placeholder="Reponse" required disabled>
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                               </div>
                            @endif

            </div>
            @php
            $nb_question+=1
            @endphp
        @endforeach
    </div>

    <div class="col" id="submit_form">
        <br><button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
    </div>

    <div id="background_create">
        <!-- div qui accueil le background si selectionné -->
    </div>

    <!-- Si un background personnalisé existe -->
    @if(isset($formulaire->background) === true and $formulaire->background !== null)
    <input type="text" name="check_background" id="edit_background" value="{{ $formulaire->background }}" hidden>
    @endif

    </form>


</div>
<script type="text/javascript" src="{{ URL::asset('js/create_form.js') }}"></script>
@endsection
