<?php

namespace App\Http\Controllers;

use App\Amis;
use App\QuestionChoixMultiple;
use App\Formulaire;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Reponse;
use Redirect;
use Image;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\Psr7\str;

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
        $user_id = Auth::id();
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

        //Generation du token
        $char = "abcdefghijklmnopqrstuvwxyz0123456789";
        $chain = str_shuffle($char);

        $token = time().$chain;

        $inputs = $request->input();

        Formulaire::create([
            "name" => $request->input('name'),
            "open_on" => $request->input('open_on'),
            "close_on" => $request->input('close_on'),
            "user_id" => Auth::user()->id,
            "image" =>$image,
            "private" => $request->input('private'),
            "background" => $background,
            "token" => $token,
        ]);

        $id_form = Formulaire::all() ->where('token', '=', $token)
            ->where('user_id',$user_id)
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

        return Redirect::route('formulaires.show',[$id_form]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formulaire  $formulaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($formulaire = Formulaire::find($id)){
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
                if($nb_questions != 0){
                    $nb_reponses=round($nb_reponses/$nb_questions);
                }
               

                /* liste Amis pour partager */
                $user_id = Auth::id();
                $amis_list = Amis::where('user1', '=', $user_id)
                    ->where('pending', '=', 1)
                    ->orWhere('user2', '=', $user_id)
                    ->where('pending', '=', 1)
                    ->get();

                $amis = [];

                for($i = 0; $i <= count($amis_list)-1; $i++) {
                    if($user_id == $amis_list[$i]['user1']) {
                        array_push($amis, $amis_list[$i]['user2']);
                    }
                    else if ($user_id == $amis_list[$i]['user2']) {
                        array_push($amis, $amis_list[$i]['user1']);
                    }
                }
                $amis_name = [];

                foreach ($amis as $id_amis) {
                    $amis_name[$id_amis] = User::where('id', '=', $id_amis)->first();
                }
                return view('formulaire.show', [
                    'formulaire' => $formulaire,
                    'questions'=>$questions,
                    'reponses'=>$reponses,
                    'nb_reponses' =>$nb_reponses,
                    'choix_question_multiples' =>$choix_question,
                    'amis' => $amis_name,
                ]);
            }
            else{
                return view("formulaire.block", ['formulaire_name' => $formulaire->name]);
            }
        }
        else{
            abort(404);
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
        if($formulaire = Formulaire::find($id)){
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
                    return view("formulaire.block", ['formulaire_name' => $formulaire->name]);
                }
        }
        else{
            abort(404);
        }
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
        $user_id = Auth::id();
        //image banniere
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(public_path('/Images/Formulaire/' . $filename));
            $image = $filename;
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
        $table_update = [
            "name" => $request->input('name'),
            "open_on" => $request->input('open_on'),
            "close_on" => $request->input('close_on'),
            "private" => $request->input('private'),
            "background" => $background,
        ];
        if(isset($image)){
            $table_update['image'] = $image;
        }
        //Mise à jour du formulaire
        Formulaire::where('id', $request->input('id'))
            ->update($table_update);

        $id_form = Formulaire::where('name', '=', $request->input('name'))
            ->where('user_id',$user_id)
            ->first();
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
                        ->where('user_id',$user_id)
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
                        Question::create([
                            "name" =>$value,
                            "formulaire_id" =>$id_form->id,
                        ]);
                        $new_question = "true";
                        $id_question = Question::where('name', '=', $value)
                            ->where('formulaire_id',$id_form->id)
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
                        ->where('formulaire_id',$id_form->id)
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
                    if($last_question_type != $value){
                        Reponse::where('question_id', $id_de_la_question)
                        ->delete();
                    }
                    Question::where('id', $id_de_la_question)
                        ->where('formulaire_id',$id_form->id)
                        ->update(['type_question' => $value]);
                    $type_question=$value;
                }
            }
            if(isset($new_question)){
                //dd($input);
                if(preg_match("/^type/", $input )) {
                    //dd($id_question->id);
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
                        QuestionChoixmultiple::create([
                            "name" =>$value,
                            "questions_id" =>$id_question_presente,
                        ]);
                        unset($id_question_presente);
                    }
                    //Ajout de choix dans les questions multiple si il le faut
                    elseif(isset($id_choix_question_new)){
                        if(preg_match("/^[0-9]/", $input )) {
                            QuestionChoixmultiple::create([
                                "name" =>$value,
                                "questions_id" =>$id_choix_question_new,
                            ]);
                        }
                    }
                }

            }
        };
        return Redirect::route('formulaires.show',[$id_form]);
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
    public function delete_form(Request $request){
        if ($request->ajax()) {
            $id = $request->get('id');
            Reponse::where('formulaire_id','=',$id)
            ->delete();
            $questions = Question::all()->where('formulaire_id',$id);
            foreach($questions as $question){
                if ($question->type_question == "Choix multiples"){
                    
                    $choix_question = QuestionChoixMultiple::all()->where('questions_id',$question->id);
                    foreach($choix_question as $choix){
                        QuestionChoixMultiple::where('questions_id',$question->id)->delete();
                    }
                }
                Question::where('id',$question->id)->delete();
            }
            Formulaire::where('id',$id)->delete();
            return response()->json();
        }
        abort(404);  
    }

}