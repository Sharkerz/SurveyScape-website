
@extends('layouts.app')

@section('captcha')
    {!! htmlScriptTagJsApi() !!}
@endsection

@section('content')

<link href="{{ asset('css/repondre.css') }}" rel="stylesheet">

    <div class="container">

        <!-- Div titre du formulaire -->
        <div id="title">
            <h2>{{ $formulaire->name }}</h2>
            <div id="auteur">
                <p class="float-right">
                    <img id="img_auteur" src="/avatar/{{$formulaire->user->avatar}}">
                </p>
                <p class="name_auteur">
                    créé par {{ $formulaire->user->name }}
                </p>
            </div>
        </div>

        <form method="post" id="form_reponse" action="{{ route('envoyer_reponse') }}">
            @csrf
            <input type="hidden" name="form_id" value="{{ $formulaire->id }}">

            <div id="questions">
            <!-- Questions -->
            @foreach($questions as $question)
                <div class="div_question">
                    <div class="question">
                        <h3> {{ $question->name }} </h3>
                    </div>
                    <div class="proposition">
                        <input type="hidden" class="type_question" value="{{$question->type_question}}">

                        <!-- Reponse si choix multiples -->
                        @if($question->type_question == "Choix multiples")
                            @foreach($choix_question_multiples as $choix_question_multiple)
                                @foreach($choix_question_multiple as $choix_question)
                                    @if($choix_question->questions_id == $question->id)
                                        <div class="form-check multiple_choice">
                                            <input name="{{ $question->id }}" type="radio" class="form-check-input" id="{{$choix_question->id}}" value="{{ $choix_question->name }}">
                                            <label class="form-check-label" for="{{$choix_question->id}}">
                                                {{ $choix_question->name }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach

                        <!-- Reponse si Texte -->
                        @elseif($question->type_question == "Texte")
                                    <textarea class="form-control textarea" name="{{ $question->id }}" rows="3" placeholder="Votre réponse..." required></textarea>
                        @endif
                    </div>
                </div>

            @endforeach
            </div>

            <div id="envoyer">
                {!! htmlFormSnippet() !!}
                @if (count($errors) > 0)
                    <div class="alert alert-danger" id="div_error">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <button type="submit" class="btn btn-primary btn-lg center-block" id="btn_envoyer">Envoyer</button>
            </div>

        </form>

    </div>

<!-- Si un background personnalisé existe -->
@isset($formulaire->background)
    <input type="text" id="background" value="{{ $formulaire->background }}" hidden>
@endisset


<script type="text/javascript" src="{{ URL::asset('js/repondre.js') }}"></script>

@endsection
