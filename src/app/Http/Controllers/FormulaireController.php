<?php

namespace App\Http\Controllers;

use App\QuestionChoixMultiple;
use App\Formulaire;
use App\Question;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Image;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $formulaires = Formulaire::all() -> where('user_id', $user_id);
        return view('formulaire.index', [
            'formulaires' => $formulaires
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulaire.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        function startsWith($string, $startString) {
            $len = strlen($startString);
            return (substr($string, 0, $len) === $startString);
        }

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(public_path('/Images/Formulaire/' . $filename));
            $image = $filename;
        }
        else{
            $image ="default.png";

        }
        $inputs = $request->input();
      
        Formulaire::create([
            "name" => $request->input('name'),
            "open_on" => $request->input('open_on'),
            "close_on" => $request->input('close_on'),
            "user_id" => Auth::user()->id,
            "image" =>$image,
        ]);

        $id_form = Formulaire::where('name', '=', $request->input('name'))
                ->first();
      
        foreach($inputs as $input=>$value){
            if(startsWith($input,"q") == true){
                Question::create([
                    "name" =>$value,
                    "formulaire_id" =>$id_form->id,
                ]);
                $id_question = Question::where('name', '=', $value)
                ->first();
                $question = $input;
            }
            if(isset($question)){
                if(preg_match("/^type+$question/", $input )) {
                    Question::where('id', $id_question->id)
                    ->update(['type_question' => $value]);
                    $type_question=$value;
                    
                }
            }

            if(isset($type_question) =="Choix multiples"){
                            if(preg_match("/^[0-9]/", $input )) {
                    QuestionChoixmultiple::create([
                        "name" =>$value,
                        "questions_id" =>$id_question->id,
                    ]);
                }
            }
            
           

        };

        return Redirect::route('formulaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formulaire  $formulaire
     * @return \Illuminate\Http\Response
     */
    public function show(Formulaire $formulaire)
    {
        return view('formulaire.show', [
            'formulaire' => $formulaire
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formulaire  $formulaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formulaire = Formulaire::find($id);
        $questions = Question::all() -> where('formulaire_id', $formulaire->id);
        $choix_question=[];
        foreach($questions as $question){
            $question->id;
            $id_de_la_question = $question->id;
            $choix_question_multiples = QuestionChoixMultiple::all() -> where('questions_id', $id_de_la_question);
            array_push($choix_question,$choix_question_multiples);
        }
        return view('formulaire.edit', [
            'formulaire' => $formulaire,
            'questions'=>$questions,
            'choix_question_multiples' =>$choix_question,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formulaire  $formulaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formulaire $formulaire)
    {
        $formulaire->delete();
        return Redirect::route('formulaires.index');
    }

    public function startsWith($string, $startString) {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    public function update_form(Request $request){
    //Mise à jour des données en rapport avec le formulaire
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(public_path('/Images/Formulaire/' . $filename));
            $image = $filename;
        }
        else{
            $image ="default.png";

        }
         $inputs = $request->input();
        //Mise à jour du formulaire
         Formulaire::where('id', $request->input('id'))
         ->update([  
            "name" => $request->input('name'),
            "open_on" => $request->input('open_on'),
            "close_on" => $request->input('close_on'),
            "image" =>$image,]);

            $id_form = Formulaire::where('name', '=', $request->input('name'))
                ->first();

            foreach($inputs as $input=>$value){
                if(preg_match("/^id_q/", $input )) {
                    $id_de_la_question = $value;
                  
                }
                //Modification des question si elle existe deja
                if(preg_match("/^q/", $input )){
                    if(Question::find($id_de_la_question)){
                        Question::where('id', '=', $id_de_la_question)
                        ->update([
                        "name" =>$value,
                        ]);
                        $question = $input;
                    }
                    //Ajout de question si elle existe pas encore
                    else{
                        Question::create([
                            "name" =>$value,
                            "formulaire_id" =>$id_form->id,
                        ]);
                        $id_question = Question::where('name', '=', $value)
                        ->first();
                        
                    }
                    
                   
                }
                //Modification du type de question utiliser pour les questions a choix multiples
                if(isset($question)){
                    if(preg_match("/^type+$question/", $input )) {
                        Question::where('id', $id_de_la_question)
                        ->update(['type_question' => $value]);
                        $type_question=$value;
                    }
                }
                elseif(isset($id_question)){
                    if(preg_match("/^type/", $input )) {
                        Question::where('id', $id_question->id)
                        ->update(['type_question' => $value]);
                        $type_question=$value;
                        unset($id_question);
                    }
                    
                       
                }
                if(isset($type_question) =="Choix multiples"){
                    if(preg_match("/^choix_question/", $input )){
                        $id_choix_question = $value;
                    }
                    elseif(isset($id_question)){
                        $id_choix_question_new = $id_question->id;
                    }
                    //Modification des choix de question multiple
                    if(preg_match("/^[0-9]/", $input )) {
                        if (isset($id_choix_question)){
                            QuestionChoixmultiple::where('id', '=', $id_choix_question)
                                ->update([
                                "name" =>$value,
                            ]);
                            unset($id_choix_question);
                        }
                        //Ajout de choix dans les questions multiple si il le faut
                        else{
                            if(preg_match("/^[0-9]/", $input )) {
                                QuestionChoixmultiple::create([
                                    "name" =>$value,
                                    "questions_id" =>$id_choix_question_new,
                                ]);
                                unset($id_de_la_question);
                                
                            }
                        }
                    }
                
                unset($question);
                
                }
            };
            return Redirect::route('formulaires.index');
    }
    
}
