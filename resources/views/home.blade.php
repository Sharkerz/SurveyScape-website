@extends('layouts.app')

@section('content')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<div class="container" id="divcontain_home">
    <p id="bonjour_txt">Bonjour {{ Auth::user()->name }},</p>
    <div id="dashboard">
        <div class="row">
            <div class="col">
                <div class="card dash" id="dash_amis" onclick="window.location.href='/Amis'">
                    <h3 id="text_dashboard" class="text_dashboard"> Vous avez <br> {{ $nbr_amis }} Amis </h3>
                </div>
            </div>
            <div class="col">
                <div class="card dash" id="dash_form" onclick="window.location.href='/formulaires'">
                    <h3 id="text_dashboard" class="text_dashboard">Vous avez créé <br> {{ $nbr_form }} Formulaires </h3>
                </div>
            </div>
            <div class="col">
                <div class="card dash" id="dash_notif">
                    <h3 id="text_dashboard" class="text_dashboard"> {{ $nbr_notif }} notifications <br> en attente </h3>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
