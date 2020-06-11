@extends('layouts.app')

@section('content')


<link href="{{ asset('css/show_my_form.css') }}" rel="stylesheet">

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
                @if($question->type_question === "Choix multiples")
                    
                @elseif($question->type_question === "Texte")
                    <div class="Liste_Reponse">
                    @php
                        $nb_reponses_question = 0
                        @endphp
                        @foreach($reponses as $reponse)
                            @if($nb_reponses_question >= 3)
                                <div class="Autres_reponses">
                                    <button type="button" class="btn btn-light">Afficher toutes les réponses</button>
                                </div>
                            
                            @elseif($reponse->question_id == $question->id)
                            <div class="Reponse_Texte">{{$reponse->response}}</div>
                                @php
                                $nb_reponses_question+=1
                                @endphp
                            @endif
                        @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            @php
            $nb_question+=1
            @endphp
        @endforeach
    </div>

</div>

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
