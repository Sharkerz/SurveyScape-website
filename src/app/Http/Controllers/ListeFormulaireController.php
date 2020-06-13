<?php

namespace App\Http\Controllers;

use App\Formulaire;
use App\Partage_form;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListeFormulaireController extends Controller
{
    function list() {
        $date = Carbon::today();

        $formulaires = Formulaire::where('private', '=', '0')
            ->where('open_on', '=', NULL)
            ->where('user_id', '!=', Auth::id())
            ->orwhere('private', '=', '0')
            ->whereDate('open_on', '<', $date)
            ->whereDate('close_on', '>', $date)
            ->where('user_id', '!=', Auth::id())
            ->paginate(10);

        $partages = Partage_form::all() ->where('user_id', '=', Auth::id());
        $tab_partages = [];
            foreach ($partages as $partage) {
                $form = Formulaire::find($partage->formulaire_id);
                    if($form->open_on != NULL && $form->close_on != Null){
                        if($form->open_on < $date && $form->close_on>$date){
                            array_push($tab_partages, $form);
                        }       
                    }
                    else{
                        array_push($tab_partages, $form);
                    } 
            }  
        return view('listeForm.index', ['formulaires' => $formulaires, 'partage' => $tab_partages]);
    }
}