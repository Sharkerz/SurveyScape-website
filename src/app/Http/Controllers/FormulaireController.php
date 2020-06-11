<?php

namespace App\Http\Controllers;

use App\Amis;
use App\QuestionChoixMultiple;
use App\Formulaire;
use App\Question;
use Illuminate\Http\Request;
use Auth;
use App\Reponse;
use Redirect;
use Image;
use Symfony\Component\Console\Input\Input;

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

        // Image banniere
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(public_path('/Images/Formulaire/' . $filename));
            $image = $filename;
        }
        else{
            $image ="default.png";

        }

        //Background
        if ($request->has('background')){
            $background = $request->input('background');
        }
        else{
            $background = null;

        }

        $inputs = $request->input();
        //dd($inputs);
        Formulaire::create([
            "name" => $request->input('name'),
            "open_on" => $request->input('open_on'),
            "close_on" => $request->input('close_on'),
            "user_id" => Auth::user()->id,
            "image" =>$image,
            "private" => $request->input('private'),
            "background" => $background,
        ]);

        $id_form = Formulaire::where('created_at', '=', now())
            ->first();

        foreach($inputs as $input=>$value){
            if(startsWith($input,"q") == true){
                Question::create([
                    "name" =>$value,
                    "formulaire_id" =>$id_form->id,
                ]);
                $id_question = Question::where('name', '=', $value)
                                ->where('formulaire_id',$id_form->id)
                    ->first();
                $question = $input;
            }
            if(isset($question)){
                if(preg_match("/^type/", $input )) {
                    //dd($id_question->id);
                    Question::where('id', $id_question->id)
                        ->where('formulaire_id',$id_form->id)
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
    public function show($id)
    {
        $formulaire = Formulaire::find($id);
        if ($formulaire->user_id == Auth::id()){
            $questions = Question::all() -> where('formulaire_id', $formulaire->id);
            $reponses = Reponse::all()->where('formulaire_id',$formulaire->id);
            $choix_question=[];
            foreach($questions as $question){
                $question->id;
                $id_de_la_question = $question->id;
                $choix_question_multiples = QuestionChoixMultiple::all() -> where('questions_id', $id_de_la_question);
                array_push($choix_question,$choix_question_multiples);
            }
            $nb_questions = 0;
            foreach($questions as $question){
                $nb_questions +=1;
            }
            $nb_reponses = 0;
            foreach($reponses as $reponse){
                $nb_reponses +=1;
            }
            $nb_reponses=round($nb_reponses/$nb_questions);
            return view('formulaire.show', [
                'formulaire' => $formulaire,
                'questions'=>$questions,
                'reponses'=>$reponses,
                'nb_reponses' =>$nb_reponses,
                'choix_question_multiples' =>$choix_question,
            ]);
        }
        else{
            return Redirect::route('formulaires.index');
        }
       
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
        if ($formulaire->user_id == Auth::id()){
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
        else{
            return view("formulaire.block", ['formulaire_name' => $formulaire->name]);        }
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

        //image banniere
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(public_path('/Images/Formulaire/' . $filename));
            $image = $filename;
        }
        else{
            $image ="default.png";

        }

        //background
        if ($request->has('background')){
            $background = $request->input('background');
        }
        else if ($request->has('check_background')){
            $background = $request->input('check_background');
        }
        else{
            $background = null;

        }

        $inputs = $request->input();
        //Mise à jour du formulaire
        Formulaire::where('id', $request->input('id'))
            ->update([
                "name" => $request->input('name'),
                "open_on" => $request->input('open_on'),
                "close_on" => $request->input('close_on'),
                "image" =>$image,
                "private" => $request->input('private'),
                "background" => $background,
            ]);

        $id_form = Formulaire::where('name', '=', $request->input('name'))
            ->first();
      //dd($inputs);
        foreach($inputs as $input=>$value){
            if(preg_match("/^id_q/", $input )) {
                $id_de_la_question = $value;
                unset($question);
                unset($new_question);
                unset($type_question);
                unset($id_choix_question);
                unset($id_question_existante);
                unset($id_choix_question_new);
            }
            //Modification des question si elle existe deja
            if(preg_match("/^q/", $input )){
                if($test_form = Question::find($id_de_la_question)){
                    if($test_form->formulaire_id == $id_form->id){
                    Question::where('id', '=', $id_de_la_question)
                        ->where('formulaire_id',$id_form->id)
                        ->update([
                            "name" =>$value,
                        ]);


                    $question = $input;
                    $temp = Question::where('id', '=', $id_de_la_question)
                    ->get('type_question');
                    $last_question_type = $temp[0]->type_question ;

                    $id_question_existante = Question::where('name', '=', $value)
                        ->first();

                    }
                    //Ajout de question si elle existe pas encore
                    else{
                        dd($input);
                        Question::create([
                            "name" =>$value,
                            "formulaire_id" =>$id_form->id,
                        ]);
                        $new_question = "true";
                        $id_question = Question::where('name', '=', $value)
                            ->first();
                        unset($id_question_existante);
                    }
                    }

                //Ajout des premières question qui existe pas forcement en bdd
                else{
                    Question::create([
                        "name" =>$value,
                        "formulaire_id" =>$id_form->id,
                    ]);
                    $new_question = "true";
                    $id_question = Question::where('name', '=', $value)
                        ->first();
                    }
            }

            //Modification du type de question utiliser pour les questions a choix multiples
            if(isset($question)){
                if(preg_match("/^type/", $input )) {
                    if($last_question_type == "Choix multiples" && $value=="Texte"){
                        QuestionChoixMultiple::where('questions_id', $id_de_la_question)
                        ->delete();
                    }
                    Question::where('id', $id_de_la_question)
                        ->where('formulaire_id',$id_form->id)
                        ->update(['type_question' => $value]);
                    $type_question=$value;
                }
            }
            if(isset($new_question)){
                if(preg_match("/^type/", $input )) {

                    Question::where('id', $id_question->id)
                        ->where('formulaire_id',$id_form->id)
                        ->update(['type_question' => $value]);
                    $type_question=$value;
                    $id_new_question =$id_question->id;
                }


            }
            if(isset($type_question) && $type_question =="Choix multiples"){
                if(preg_match("/^choix_question/", $input )){
                    $id_choix_question = $value;
                }
                elseif(isset($question) && (preg_match("/^nouveau_choix/", $input ))){
                    $id_question_presente = $id_question_existante->id;
                }
                elseif(isset($id_new_question)){
                    $id_choix_question_new =$id_new_question;

                }
                //Modification des choix de question multiple
                if(preg_match("/^[0-9]/", $input )) {
                    if(isset($id_choix_question)){
                        if( QuestionChoixmultiple::find($id_choix_question)){
                            QuestionChoixmultiple::where('id', '=', $id_choix_question)
                            ->update([
                                "name" =>$value,
                            ]);
                        unset($id_choix_question);
                        }
                    }
                      //Ajout de choix a une question existante
                      elseif(isset($id_question_presente)){
                        //dd($input);
                        QuestionChoixmultiple::create([
                            "name" =>$value,
                            "questions_id" =>$id_question_presente,
                        ]);
                        //dd($input);
                        unset($id_question_presente);
                    }
                    //Ajout de choix dans les questions multiple si il le faut
                    elseif(isset($id_choix_question_new)){
                        if(preg_match("/^[0-9]/", $input )) {
                            QuestionChoixmultiple::create([
                                "name" =>$value,
                                "questions_id" =>$id_choix_question_new,
                            ]);

                            //unset($id_new_question);
                        }
                    }
                }

            }
        };
        return Redirect::route('formulaires.index');
    }

    public function upload_background(Request $request) {
        if ($request->ajax()) {
                $file = $request->file('image_fond_form');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(1920, 1080)->save( public_path('/Images/background_form/' . $filename ) );
                return response()->json(['background'=>$filename],200);
        }
        abort(404);
    }

}
