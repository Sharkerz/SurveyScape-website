@extends('layouts.app')

@section('content')

@php
    setlocale(LC_ALL, 'fr')
@endphp

<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

<!-- Bouton se déconnecter -->
<div id="contain_profil" class="container">
    <div id="profil_bar" class="row">
        <a type="button" class="btn btn-danger btn_profil" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Déconnexion
        </a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="row">
        <!-- Photo de profil -->
        <div class="col-sm">
            <img id="avatar" src="/avatar/{{ $user->avatar }}">
        </div>

        <!-- Nom de l'utilisateur -->
        <div class="col-sm">
            <p id="profil_name">Profil de {{ $user->name }}</p>
        </div>
    </div>

    <div class="row" >

        <!-- Changer la photo de profil -->
        <div class="col-sm" id="div_change_avatar">
            <form enctype="multipart/form-data" action="{{ route('update_avatar') }}" method="POST">
                <input type="file" class="form-control-file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <br>

                <input type="submit" id="btn_submit_avatar" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>

        <!-- Informations de profil -->
        <div class="col-sm" id="nav_profil">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        Informations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#modifier" role="tab" aria-controls="profile" aria-selected="false">
                        Modifier
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#modif_mdp" role="tab" aria-controls="profile" aria-selected="false">
                        Mot de passe
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        API
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <div class="container">

                        <!-- Pseudo -->
                        <div class="row">
                            <div class="col">
                                <p class="profil_bold">Pseudo</p>
                            </div>
                            <div class="col">
                                <p>{{ $user->name }}</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row">
                            <div class="col">
                                <p class="profil_bold">Email</p>
                            </div>
                            <div class="col">
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>

                        <!-- Date de creation -->
                        <div class="row">
                            <div class="col">
                                <p class="profil_bold">Creation du compte</p>
                            </div>
                            <div class="col">
                                <p>{{ $user->created_at->formatLocalized('%A %d %B %Y') }}</p>
                            </div>
                        </div>

                        <!-- Dernières modifications -->
                        <div class="row">
                            <div class="col">
                                <p class="profil_bold">Dernière modification</p>
                            </div>
                            <div class="col">
                                <p>{{ $user->updated_at->formatLocalized('%A %d %B %Y') }}</p>
                            </div>
                        </div>

                    </div>

                    <br>
                </div>

                <!-- Modifier tab -->
                <div class="tab-pane fade" id="modifier" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <form method="post" action="{{ route('profil.update', $user) }}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}

                        <!-- Modifier Pseudo -->
                            <div class="row" id="form_profil">
                                <div class="col">
                                    <p class="profil_bold">Pseudo</p>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="name"  value="{{ $user->name }}" />
                                </div>
                            </div>

                            <!-- modifier email -->
                            <div class="row" id="form_profil">
                                <div class="col">
                                    <p class="profil_bold">Email</p>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="email" name="email"  value="{{ $user->email }}" />
                                </div>
                            </div>

                            <!-- confirmer mot de passe -->
                            <div class="row" id="form_profil">
                                <div class="col">
                                    <p class="profil_bold">Confirmer le mot de passe</p>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="password" name="password" required/>
                                </div>
                            </div>

                            <!-- Bouton Confirmer les modifications -->
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary" id="btn_confirm">Confirmer</button>
                            </div>

                    </form>
                </div>

                <!-- mot de passe tab -->
                <div class="tab-pane fade" id="modif_mdp" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <form method="post" action="{{ route('update_password') }}">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}

                        <!-- mot de passe actuel -->
                        <div class="row" id="form_profil">
                            <div class="col">
                                <p class="profil_bold"> Mot de passe actuel</p>
                            </div>
                            <div class="col">
                                <input class="form-control" type="password" name="current_password" required/>

                            </div>
                        </div>

                        <!-- nouveau mot de passe -->
                        <div class="row" id="form_profil">
                            <div class="col">
                                <p class="profil_bold">Nouveau mot de passe</p>
                            </div>
                            <div class="col">
                                <input class="form-control" type="password" name="password" required/>
                            </div>
                        </div>

                        <!-- confirmer nouveau mot de passe -->
                        <div class="row" id="form_profil">
                            <div class="col">
                                <p class="profil_bold">Confirmer le mot de passe</p>
                            </div>
                            <div class="col">
                                <input class="form-control" type="password" name="password_confirmation" required/>
                            </div>
                        </div>

                        <!-- Bouton Confirmer les modifications -->
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary" id="btn_confirm">Confirmer</button>
                        </div>

                    </form>
                </div>


                <!-- Api tab -->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    Votre clé api est .. blabla <br>
                    Soon
                </div>

            </div>
        </div>
    </div>

    <!-- Alertes -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection
