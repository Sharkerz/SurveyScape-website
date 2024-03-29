<?php

namespace App\Http\Controllers;

use App\Formulaire;
use App\Question;
use App\QuestionChoixMultiple;
use App\Reponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Validator;

class ReponseController extends Controller
{

function repondre($token) {
    $date = Carbon::today();
    if($formulaire = Formulaire::where('token', '=', $token)->first()) {
        if($formulaire->open_on != NULL && $formulaire->close_on != Null){
            if($formulaire->open < $date && $formulaire->close_on>$date){
                $questions = Question::all()->where('formulaire_id', $formulaire->id);
                    $choix_question = [];
                    foreach ($questions as $question) {
                        $question->id;
                        $id_de_la_question = $question->id;
                        $choix_question_multiples = QuestionChoixMultiple::all()->where('questions_id', $id_de_la_question);
                        array_push($choix_question, $choix_question_multiples);
                    }


                    return view('reponse.index', [
                        'formulaire' => $formulaire,
                        'questions' => $questions,
                        'choix_question_multiples' => $choix_question,
                    ]);
                        }
        }
        else{
            $questions = Question::all()->where('formulaire_id', $formulaire->id);
            $choix_question = [];
            foreach ($questions as $question) {
                $question->id;
                $id_de_la_question = $question->id;
                $choix_question_multiples = QuestionChoixMultiple::all()->where('questions_id', $id_de_la_question);
                array_push($choix_question, $choix_question_multiples);
            }


            return view('reponse.index', [
                'formulaire' => $formulaire,
                'questions' => $questions,
                'choix_question_multiples' => $choix_question,
            ]);
                }
        

    }
    abort(404);
}

function envoyer(Request $request) {

    $validator = Validator::make($request->all(), [
        recaptchaFieldName() => recaptchaRuleName()
    ]);
    if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
    }

    $inputs = $request->input();
    $id_form = $request->input('form_id');
    if(auth()->check() == true){
        $user_id = Auth::user()->id;
    }
    else{
        $user_id = '0';
    }
    //envoie du form
    foreach($inputs as $input =>$value){
        if(preg_match("/^[0-9]/", $input )){
            Reponse::create([
                "response" => $value,
                "question_id" =>$input,
                "user_id" => $user_id,
                "formulaire_id" => $id_form,
            ]);
        }

    }
    $formulaire = Formulaire::find($id_form);

    return view("reponse.success", ['formulaire_name' => $formulaire->name]);
}

}
