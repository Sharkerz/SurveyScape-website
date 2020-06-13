@extends('layouts.app')

@section('content')


<link href="{{ asset('css/show_my_form.css') }}" rel="stylesheet">

<div id="back">
    <a href="javascript:window.history.go(-1)"><i id="back_logo" class="material-icons">arrow_back</i></a>
</div>
<div id="Delete_Form">
    <i class="material-icons"  id="btn-task Delete_Form" id="icon_notif">delete</i>
</div>
<div id="Modify_Form">
    <i class="material-icons"  id="btn-task" id="icon_notif">create</i>
</div>
<div class="container">
    <!-- Div titre du formulaire -->
    <div id="title">
        <h2>{{ $formulaire->name }}</h2>
        <h3>Il y a actuellement  :{{$nb_reponses}} réponses</h3>
    </div>

    <div id="questions">
    @php
    $nb_question=1;
    $collect_data = [];
    @endphp
        @foreach($questions as $question)
            <div class="div_question">
                <div class="question">
                    <h3>Question n°{{$nb_question}}:{{$question->name}}</h3>
                </div>  
                @if($question->type_question === "Choix multiples")
                <div class ="Resultat_graphique">
                    <canvas id="canvas{{$nb_question}}" height="220" width="610">
                @php
                        $table_question =[];
                    @endphp
                    @php
                        $table =[];
                    @endphp
                @foreach($reponses as $reponse)
                    @if($reponse->question_id == $question->id)
                        @php
                            $temp = $reponse->response;
                            array_push($table,$temp);
                            
                        @endphp
                    @endif
                @endforeach
                @php
                $data = (json_encode($table,JSON_UNESCAPED_SLASHES));
                array_push($collect_data,addslashes($data));
                @endphp
            <script>
            var nb_question = '<?php echo($nb_question)?>';
             var data_send = '<?php echo($collect_data[$nb_question-1])?>';
            ;</script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.js"></script>
                <script>
                    //Pie Chart
                if(data_send!=""){
                    var test = JSON.parse( data_send );
                    var data = [];
                    var question = [];
                    var colors = [];
                    var colorArray = ['#ff7f50','#87cefa','#da70d6','#32cd32','#6495ed','#ff69b4','#ba55d3','#cd5c5c','#ffa500','#40e0d0'];
                    var nb_data = [];
                    for(var i=0; i <test.length;i++){
                        for (var key in nb_data){
                            if(test[i] == key){
                                nb_data[key] +=1;
                            }
                        }
                        if(nb_data[test[i]]  == null){
                            nb_data[test[i]] = 1;
                        }
                        
                        };
                    for (var key in nb_data){
                            question.push(key);
                        }
                    ctx =  document.getElementById("canvas"+nb_question+"").getContext("2d");
                    function getRandomInt(max) {
                        return Math.floor(Math.random() * Math.floor(max));
                    }
                    var max_random = colorArray.length;
                    for (var key in nb_data){
                        data.push(nb_data[key]);
                    }
                    var labels =[];
                    for(var i=0; i <question.length;i++){
                        random = getRandomInt(max_random);
                        if(random == last_random){
                            random = getRandomInt(max_random);
                        }
                        colors.push(colorArray[random]);
                        var last_random = random;
                        };
                    for(var i=0; i <question.length;i++){
                        labels.push(question[i])
                        };
                    new Chart(ctx,{
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                        data: data,
                                        backgroundColor:colors,
                                    }]
                            },
                    });
                }
                </script>
                    </canvas>
                </div>
                @elseif($question->type_question === "Texte")
                    <div class="Liste_Reponse">
                    @php
                        $nb_reponses_question = 0
                        @endphp
                        @foreach($reponses as $reponse)
                            @if($nb_reponses_question == 3)
                                    <button type="button" class="btn btn-light Afficher_Reponses">Afficher toutes les réponses</button>
                                <div class="test">
                                @php
                                $nb_reponses_question+=1
                                @endphp
                            @elseif($reponse->question_id == $question->id && $nb_reponses_question <=3)
                            <div class="Reponse_Texte">{{$reponse->response}}</div>
                                @php
                                $nb_reponses_question+=1
                                @endphp
                            @elseif($reponse->question_id == $question->id && $nb_reponses_question >=3)
                            <div  class="Reponse_Texte_cacher">{{$reponse->response}}</div>
                                @php
                                $nb_reponses_question+=1
                                @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
            @php
            $nb_question+=1
            @endphp
        @endforeach
    </div>

</div>
<script type="text/javascript" src="{{ URL::asset('js/show_form.js') }}"></script>
@endsection

<!-- Si un background personnalisé existe -->
@isset($formulaire->background)
    <input type="text" id="background" value="{{ $formulaire->background }}" hidden>
@endisset

<script>
    var id_form = '{{$formulaire->id}}' ;
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/Formulaire.js') }}"></script>
