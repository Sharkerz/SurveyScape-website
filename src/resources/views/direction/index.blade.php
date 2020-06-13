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
                    Développeur  <br>
                </p>
                <p class="text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
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
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
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
                    Développeur  <br>
                </p>
                <p class="text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
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
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
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