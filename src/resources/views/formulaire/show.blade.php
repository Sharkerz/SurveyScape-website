@extends('layouts.app')

@section('content')


<link href="{{ asset('css/show_my_form.css') }}" rel="stylesheet">

<div id="back">
    <a href="javascript:window.history.go(-1)"><i id="back_logo" class="material-icons">arrow_back</i></a>
</div>

<div id="Modify_Form">
    <i class="material-icons"  id="btn-task" id="icon_notif">create</i>
</div>
<div class="container">


    <!-- Div titre du formulaire -->
    <div id="title">
        <h2>{{ $formulaire->name }}</h2>
        <h3>Il y a actuellement  :{{$nb_reponses}} réponses</h3>
    </div>

    <div id="questions">
    @php
    $nb_question=1
    @endphp
        @foreach($questions as $question)
            <div class="div_question">
                <div class="question">
                    <h3>Question n°{{$nb_question}}:{{$question->name}}</h3>
                </div>
                <div class ="Resultat_graphique">
                @if($question->type_question === "Choix multiples")
                    @php
                        $data = array();
                    @endphp
                @foreach($reponses as $reponse)
                    @if($reponse->question_id == $question->id)
                        @php
                            $temp = $reponse->response;
                            
                        @endphp
                    @endif
                    <script> var data = '{{$temp}}';</script>
                    <script type="text/javascript" src="{{ URL::asset('js/show_form.js') }}"></script>
                @endforeach
                @php
                    
                    
                @endphp
                    
                </div>
                @elseif($question->type_question === "Texte")
                    <div class="Liste_Reponse">
                    @php
                        $nb_reponses_question = 0
                        @endphp
                        @foreach($reponses as $reponse)
                            @if($nb_reponses_question == 3)
                                    <button type="button" class="btn btn-light Afficher_Reponses">Afficher toutes les réponses</button>
                                <div class="test">
                                @php
                                $nb_reponses_question+=1
                                @endphp
                            @elseif($reponse->question_id == $question->id && $nb_reponses_question <=3)
                            <div class="Reponse_Texte">{{$reponse->response}}</div>
                                @php
                                $nb_reponses_question+=1
                                @endphp
                            @elseif($reponse->question_id == $question->id && $nb_reponses_question >=3)
                            <div  class="Reponse_Texte_cacher">{{$reponse->response}}</div>
                                @php
                                $nb_reponses_question+=1
                                @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
            @php
            $nb_question+=1
            @endphp
        @endforeach
    </div>

</div>
<script type="text/javascript" src="{{ URL::asset('js/show_form.js') }}"></script>
@endsection

<!-- Si un background personnalisé existe -->
@isset($formulaire->background)
    <input type="text" id="background" value="{{ $formulaire->background }}" hidden>
@endisset

<script>
    var id_form = '{{$formulaire->id}}' ;
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/Formulaire.js') }}"></script>
