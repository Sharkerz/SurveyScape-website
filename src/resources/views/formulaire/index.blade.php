@extends('layouts.app')

@section('content')

<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<div class="row justify-content-center">
    <h1 class="titre">Vos Formulaires</h1>
</div>

<div class="div-blanche">
    <div class="container">
        <div class="row justify-content-center">
            <button onclick="window.location.href='/formulaires/create'" id="btn-create" type="button" class="btn btn-success bouton-creation">Créer un formulaire</button>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Propriétaire</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ListFormulaire">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    var form = new FormData();
    var token = "{{ Auth::user()->api_token }}";
    console.log(token);
    var settings = {
        "url": "/api/formulaires",
        "method": "GET",
        "timeout": 0,
        "cache": false,
        "headers": {
            "Accept": "application/json",
            "Authorization": "Bearer " + token,
            "Content-Type": "multipart/form-data; boundary=--------------------------859678193489068141715509"
        },
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form,
        "dataType": "json",
        success: function (data) {
            console.log(data);
        }
    };
    $.ajax(settings)

</script>

@endsection
