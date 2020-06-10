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

        <form action="{{ route('formulaires.destroy', ['formulaire' => $formulaire->id]) }}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type='submit' value="Supprimer">
        </form>
    </div>

    <div id="questions">
        @foreach($questions as $question)
            <div class="div_question">
                <div class="question">
                    <h3>{{$question->name}}</h3>
                </div>
                @if($question->type_question === "Choix multiples")
                    <!-- -->
                    multiple
                @elseif($question->type_question === "Texte")
                    <!-- -->
                    txt
                @endif

                @foreach($reponses as $reponse)
                    @if($reponse->question_id == $question->id)
                    {{$reponse->response}}
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>

{{--                    {{ $formulaire->name }}--}}
{{--                    {{ $formulaire->user->name }}--}}
{{--                    {{ $formulaire->open_on }}--}}
{{--                    {{ $formulaire->close_on }}--}}


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
