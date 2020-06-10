@extends('layouts.app')

@section('content')

<link href="{{ asset('css/index_form.css') }}" rel="stylesheet">
<div id="Modify_Form">
    <i class="material-icons"  id="btn-task" id="icon_notif">create</i>
</div>
<div class="container">

<h1>{{ $formulaire->name }}</h1>

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

                    @endforeach
                @endforeach
                <div class="card-body">
                    {{ $formulaire->name }}
                    {{ $formulaire->user->name }}
                    {{ $formulaire->open_on }}
                    {{ $formulaire->close_on }}

                    
                    <form action="{{ route('formulaires.destroy', ['formulaire' => $formulaire->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger" type='submit' value="Supprimer">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    var id_form = '{{$formulaire->id}}' ;
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/Formulaire.js') }}"></script>
