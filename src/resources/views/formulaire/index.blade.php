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
<script>
$(document).ready(function() {
    fetch('http://localhost:8000/api/formulaires')
        .then(data => {
            return data.json()
        })
        .then(data => {
            var monhtml = "";
            data.data.forEach(formulaire => {
                console.log(formulaire.name);
                monhtml += `
                    <tr>
                        <td>` + formulaire.name + `</td>
                        <td>` + formulaire.owner.name + `</td>
                        <td>` + formulaire.open_on + `</td>
                        <td>` + formulaire.close_on + `</td>
                        <td> <a href="/formulaires/` + formulaire.id + `">Afficher</a> </td>
                    </tr>
                `;
            });
            $("#ListFormulaire").html(monhtml);
            console.log(monhtml);
        });
});
</script>

@endsection
