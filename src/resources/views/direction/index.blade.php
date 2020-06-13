@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>equipe de direction</title>
    <link href="{{ asset('css/direction.css') }}" rel="stylesheet">
    <div id="back">
    <a href="javascript:window.history.go(-1)"><i id="back_logo" class="material-icons">arrow_back</i></a>
</div>
</head>
<body>
    <div class="container" id="presentation">
        <!-- <p class="texte-welcome">Créez votre questionnaire en ligne</p>
        <br> <br>
        <p class="texte-welcome">Besoin de l'avis de différentes personnes ?</p>
        <p class="texte-welcome">Obtenez rapidement et en quelques clics les réponses qu'ils vous faut.</p>
        <br><br> -->

        <div class="row" id="ronds">

            <div class="col">
                <p class="name">
                    Léo Auvray
                </p>
                <div class="photo">
                    <img class="img_rond" src="Images/direction/Leo.png">
                </div>
                <br>
                <p class="text_title">
                    Manager  <br>
                </p>
                <p class="text">
                    Spécialisé dans le management, Léo à rejoint Big Brother après avoir réaliser un stage chez 2CRSI dans le développement. Ses connaissances en language de programmation, en management et en marketing en font un élément essentiel dans l'entreprise.
                </p>
            </div>
            <div class="col">
                <p class="name">
                    Maxence Lux
                </p>
                <div class="photo">
                    <img class="img_rond" src="Images/direction/Maxence.png">
                </div>
                <br>
                <p class="text_title">
                    Développeur <br>
                </p>
                <p class="text">
                    Tout droit sorti de SUPINFO International University, Maxence à sû redonner un vent nouveau à l'entreprise. Ses connaissances en développement web, suite à son passage au sein du secteur informatique de chez ARTE, nous sont très précieuse au sein de Big Brother. 
                </p>
            </div>
            <div class="col">
                <p class="name">
                    Cron Sébastien
                </p>
                <div class="photo">
                    <img class="img_rond" src="Images/direction/Sebastien.jpg">
                </div>
                <br>
                <p class="text_title">
                    Designer  <br>
                </p>
                <p class="text">
                    En tant que développeur frontend, Sébastien à réussi à donner un vent de fraîcheur au sein du design des différents projets de chez Big Brother. Ses connaissances en language de programmation ainsi qu'en design en font un élément important pour n'importe quel projet.
                </p>
            </div>
            <div class="col">
                <p class="name">
                    Benoit Diemer
                </p>
                <div class="photo">
                    <img class="img_rond" src="Images/direction/Benoit.jpg">
                </div>
                <br>
                <p class="text_title">
                    Développeur <br>
                </p>
                <p class="text">
                En tant que développeur spécialisé dans le backend, Benoit est un élément important au sein des différentes équipes grâce à ses connaissances en développement Web. Il à sû utilisé au mieux son expérience passé chez DeltaCE afin d'améliorer les différents produits de chez Big Brother.
                </p>
            </div>
        </div>

        <!-- <div class="row" id="row_comm">
            <div class="col-2"></div>


            <div class="col">
            </div>

            <div class="col-2">
            </div>
        </div> -->


    </div>
</body>
</html>


@endsection