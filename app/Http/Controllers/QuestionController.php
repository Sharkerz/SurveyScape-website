<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionChoixMultiple;
use App\Reponse;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question as SymfonyQuestion;

class QuestionController extends Controller
{
    public function delete_choice(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if($question = QuestionChoixMultiple::find($id)){
                QuestionChoixMultiple::where('id','=',$id)
                ->delete();
                Reponse::where('response',$question->name)->delete();
               
            }
            return response()->json();
        }
        abort(404);
    }

    public function delete_question(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if(Question::find($id)){
                if(Question::where('type_question','=','Choix multiples')){
                    QuestionChoixMultiple::where('questions_id','=',$id)
                    ->delete();
                }
                Reponse::where('question_id','=',$id)
                ->delete();
                Question::where('id','=',$id)
                ->delete();
                
            }
            return response()->json(['id', $id]);
        }
        abort(404);
    }
}
