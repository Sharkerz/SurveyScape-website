@extends('layouts.app')

@section('content')

<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h1>Formulaires</h1>
                <button onclick="window.location.href='/formulaires/create'" id="btn-create" type="button" class="btn btn-success">Créer un formulaire</button>
            </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Open date</th>
                            <th>End date</th>
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
                        <td>` + formulaire.user + `</td>
                        <td>` + formulaire.open_on + `</td>
                        <td>` + formulaire.close_on + `</td>
                        <td></td>
                    </tr>
                `;
            });
            $("#ListFormulaire").html(monhtml);
            console.log(monhtml);
        });
});
</script>

@endsection
