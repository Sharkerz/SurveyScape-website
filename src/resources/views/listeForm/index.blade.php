@extends('layouts.app')

@section('content')

<link href="{{ asset('css/list_form.css') }}" rel="stylesheet">

<div class="container-fluid" id="formulaire_list">
    <ul class="nav nav-tabs" id="tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="public-tab" data-toggle="tab" href="#public" role="tab" aria-controls="public" aria-selected="true">Formulaires publics</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="friend-tab" data-toggle="tab" href="#friend" role="tab" aria-controls="friend" aria-selected="false">Formulaires partagés</a>
        </li>
    </ul>
    <div class="tab-content">

        <!-- formulaires publics -->
        <div class="tab-pane fade show active" id="public" role="tabpanel" aria-labelledby="public">
            <div id="header_list">
                <h2 class="header_title">Formulaires public disponibles</h2>
                <hr>
            </div>

            {{ $formulaires->links() }}

            @foreach($formulaires as $formulaire)

                <div class="card formulaire" id="{{ $formulaire->id }}">
                    <input type="hidden" class="form_token" value="{{ $formulaire->token }}">
                    <img class="card-img-top" alt="Image_Formulaire" src="/Images/Formulaire/{{ $formulaire->image }}">
                    <div class="card-body">
                        <h2 class="card-title"> {{ $formulaire->name }} </h2>
                        @if ($formulaire->close_on != NULL)
                            <p class="card-text"> Disponible jusqu'au {{ $formulaire->close_on }} </p>
                        @else
                            <p class="card-text"> Pas de <br> date limite </p>
                        @endif

                        <div class="auteur">
                            {{ $formulaire->user->name }}
                            <img class="img_auteur" src="/avatar/{{$formulaire->user->avatar}}">
                        </div>

                    </div>
                </div>

            @endforeach

            {{ $formulaires->links() }}
        </div>

        <!-- formulaires partagés a l'utilisateur -->
        <div class="tab-pane fade" id="friend" role="tabpanel" aria-labelledby="public">

            <!-- un utilisateur est connecté -->
            @if( Auth::check() === true)

                <div id="header_list">
                    <h2 class="header_title">Formulaires que vos amis vous partagent</h2>
                    <hr>
                </div>


                @foreach($partage as $formulaire)
                    @foreach($formulaire as $form)
                        <div class="card formulaire" id="{{ $form->id }}">
                            <input type="hidden" class="form_token" value="{{ $form->token }}">
                            <img class="card-img-top" alt="Image_Formulaire" src="/Images/Formulaire/{{ $form->image }}">
                            <div class="card-body">
                                <h2 class="card-title"> {{ $form->name }} </h2>
                                @if ($form->close_on != NULL)
                                    <p class="card-text"> Disponible jusqu'au {{ $form->close_on }} </p>
                                @else
                                    <p class="card-text"> Pas de <br> date limite </p>
                                @endif

                                <div class="auteur">
                                    {{ $form->user->name }}
                                    <img class="img_auteur" src="/avatar/{{$form->user->avatar}}">
                                </div>

                            </div>
                        </div>
                    @endforeach

                @endforeach


            <!-- invité -->
            @else

                <h1 id="error_friend"> Vous devez être connecté pour utiliser cette fonctionnalité.🤷‍♂️</h1>

            @endif

            <!-- formulaires partagés -->

        </div>

    </div>

</div>

<script type="text/javascript" src="{{ URL::asset('js/list_forms.js') }}"></script>

@endsection
