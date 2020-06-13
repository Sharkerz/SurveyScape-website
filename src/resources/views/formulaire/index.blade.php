@extends('layouts.app')

@section('content')

@php
    //Import de class Formulaire
    use App\Formulaire;
@endphp
<link href="{{ asset('css/index_form.css') }}" rel="stylesheet">

<div class="-blanche">

    <div id="DashboardCard_Container" class="container-fluid">
            <div id="header_list">
                <h2 id="title" class="header_title">Vos formulaires</h2>
                <button onclick="window.location.href='/formulaires/create'" id="Create_Form" type="button" class="btn btn-success">Créer un formulaire</button>
                <hr>
            </div>
        <div id="ListFormulaire"></div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    var form = new FormData();
    var token = "{{ Auth::user()->api_token }}";
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
            return data;
        }
    };
    $.ajax(settings)
        .then(data => {
            var monhtml = "";
            data.data.forEach(formulaire => {
                var tab_mois=new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

                var updated = new Date(formulaire.updated_at);
                var created = new Date(formulaire.created_at);
                var open = new Date(formulaire.open_on);
                var close = new Date(formulaire.close_on);

                var updated_txt = updated.getDate() + " " + tab_mois[updated.getMonth()] + " " + updated.getFullYear();
                var created_txt = created.getDate() + " " + tab_mois[created.getMonth()] + " " + created.getFullYear();
                var open_txt = open.getDate() + " " + tab_mois[open.getMonth()] + " " + open.getFullYear();
                var close_txt = close.getDate() + " " + tab_mois[close.getMonth()] + " " + close.getFullYear();

                if(formulaire.close_on !=null && formulaire.open_on !=null){
                    monhtml += `<div class="card Formulaire" id="`+formulaire.id+`">
                                    <div class="image_Formulaire">
                                        <img alt="Image_Formulaire" src="/Images/Formulaire/`+formulaire.image+`" class="image">
                                    </div>
                                    <div class=" card-body info_Formulaire">
                                        <h5 class="card-title">`+ formulaire.name + `</h5>
<hr>
                                        <div class="card-text">
                                            <h6>Ouvre le `+ open_txt + `</h6>
                                            <h6>Ferme le `+ close_txt + `</h6>
                                        </div>
                                    </div>
                                </div>`;
                }
                else{
                    monhtml += `<div class="card Formulaire" id="`+formulaire.id+`">
                                    <div class="image_Formulaire">
                                        <img alt="Image_Formulaire" src="/Images/Formulaire/`+formulaire.image+`" class="image">
                                    </div>
                                    <div class=" card-body info_Formulaire">
                                        <h5 class="card-title">`+ formulaire.name + `</h5>
<hr>
                                        <div class="card-text">
                                            <h6>Modifié le `+ updated_txt + `</h6>
                                            <h6>Crée le `+ created_txt + `</h6>
                                        </div>
                                    </div>
                                </div>`;
                }
            });
            $("#ListFormulaire").html(monhtml);
        });

</script>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/Formulaire.js') }}"></script>
