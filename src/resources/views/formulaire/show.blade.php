@extends('layouts.app')

@section('content')

<<<<<<< HEAD
<link href="{{ asset('css/show_form.css') }}" rel="stylesheet">

=======
<link href="{{ asset('css/show_my_form.css') }}" rel="stylesheet">

<div id="Modify_Form">
    <i class="material-icons"  id="btn-task" id="icon_notif">create</i>
</div>
>>>>>>> cbf44a01b603c52fca4445ee4a30d6006da8ff88
<div class="container">
    <div id="Modify_Form">
        <i class="material-icons"  id="btn-task" id="icon_notif">create</i>
    </div>
    <div id="info">
        <h1>Responses au formulaire :{{$formulaire->name}}</h1>
        <h2>Il y a actuellement  :{{$nb_reponses}} réponses</h2>
    </div>
   


<<<<<<< HEAD

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire : {{ $formulaire->name }} <button onclick="window.location.href='{{ route('formulaires.index') }}'" type="button" class="btn btn-primary">Retour</button></div>
                @foreach($questions as $question)
                    {{$question->name}}
                    @foreach($reponses as $reponse)
                        @if($reponse->question_id == $question->id)
                        {{$reponse->response}}
                        @endif
=======
    <!-- Div titre du formulaire -->
    <div id="title">
        <h2>{{ $formulaire->name }}</h2>
>>>>>>> cbf44a01b603c52fca4445ee4a30d6006da8ff88

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
<script>
    var id_form = '{{$formulaire->id}}' ;
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/Formulaire.js') }}"></script>
