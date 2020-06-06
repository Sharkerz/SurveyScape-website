@extends('layouts.app')


@section('content')
<link href="{{ asset('css/create_form.css') }}" rel="stylesheet">

<div class="container">
    <div id="Add_Form">
        <div id="Add_Question"><i class="material-icons"  id="btn-task" id="icon_notif">add_circle_outline</i></div>
        <div id="Privacy"><i class="material-icons"  id="btn-task" id="icon_notif">lock</i></div>
        <div id="Add_Banniere"><i class="material-icons"  id="btn-task" id="icon_notif">image</i></div>
        <div id="Add_Dates"><i class="material-icons"  id="btn-task" id="icon_notif">event</i></div>
    </div>

    <h1>Edition du formulaire : </h1>

    <form action="{{ route('update_form') }}" method="post">
            @csrf
        <div class="Name_Form">
            <textarea class="NomFormulaire"  required name="name" data-rows="1" tabindex="0" >{{$formulaire->name}}</textarea>
        </div>
            <label>Mettre une image en bannière: </label>
            <input type="file" name="image">
            <input type="hidden" name="id"  value="{{$formulaire->id}}" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br>
            <label for="NomFormulaire">Début de la publication:</label>
            <input type="date" id="start" name="open_on" value="null" min="2020-01-01"></br>
            <label for="NomFormulaire">Fin de la publication:</label>
            <input type="date" id="start" name="close_on" value="null" min="2020-01-01">
        <br><input type="submit">
    <div id="questions">
    @foreach($questions as $question)
        <div class="div_question">
                <input type='hidden' value='1'>
                        <div class="body_question">
                            <!-- Ligne titre + choix type -->
                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" id="id_question" name="id_q{{$question->id}}"  value="{{$question->id}}" >
                                    <input type="text" class="form-control title_question" name="q{{$question->id}}" value="{{$question->name}}" required>
                                </div>
                                @if($question->type_question == "Choix multiples")
                                <div class="col"></div>
                                <div class="col-3">
                                    <select class="form-control select_type" name="typeq{{$question->id}}">
                                    <option value="Choix multiples"selected> {{$question->type_question}}</option>
                                        <option value="Texte"> Texte</option>
                                        <option>Soon</option>
                                    </select>
                                   
                                </div>
                                
                            </div>
                            <div class="multipleChoice">
                                        <input class="nb_choice" name="nb_choice" type="hidden" value="1"> <!-- Nombre de choix -->
                                        <div class="choices">
                                        @foreach($choix_question_multiples as $choix_question_multiple)       
                                            @foreach($choix_question_multiple as $choix_question)
                                            @if($choix_question->questions_id== $question->id)
                                            <div class="row">
                                                <div class="col-5"> 
                                                <input type="hidden" name="choix_question{{$choix_question->id}}"  value="{{$choix_question->id}}" >                                                  
                                                    <input type="text" name="{{$question->id}}-{{$choix_question->id}}" class="form-control" value="{{$choix_question->name}}" required>                              
                                                </div>
                                                
                                            </div>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <i class="material-icons add_option">add</i>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($question->type_question == "Texte")
                                <div class="col"></div>
                                <div class="col-3">
                                    <select class="form-control select_type" name="typeq{{$question->id}}">
                                        <option value="Texte"selected> {{$question->type_question}}</option>
                                        <option value="Choix multiples"> Choix multiples</option>
                                        
                                        <option>Soon</option>
                                    </select>
                                   
                                </div>
                                
                            </div>
                                    <div class="multipleChoice">
                            <input class="nb_choice" name="nb_choice" type="hidden" value="1">
                            <div class="choices">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" name="1-{{$question->id}}" class="form-control" placeholder="Reponse" required disabled>
                                    </div>
                                </div>
                            </div>                    
</div>
</div>
                            @endif
                            
            </div>
        @endforeach
    </div>
    </form>

</div>
<script type="text/javascript" src="{{ URL::asset('js/create_form.js') }}"></script>
@endsection
