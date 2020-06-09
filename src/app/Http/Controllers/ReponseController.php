<?php

namespace App\Http\Controllers;

use App\Formulaire;
use App\Reponse;
use Illuminate\Http\Request;

class ReponseController extends Controller
{

function repondre($id) {
    $formulaire = Formulaire::find($id);



    $questions = Question::all() -> where('formulaire_id', $formulaire->id);
    $choix_question=[];
    foreach($questions as $question){
        $question->id;
        $id_de_la_question = $question->id;
        $choix_question_multiples = QuestionChoixMultiple::all() -> where('questions_id', $id_de_la_question);
        array_push($choix_question,$choix_question_multiples);
    }

    //Si le formulaire est public
    if($formulaire->private == '0') {
        return view('response.index', [
            'formulaire' => $formulaire,
            'questions'=>$questions,
            'choix_question_multiples' =>$choix_question,
        ]);
    }

    abort(404);

}

}
