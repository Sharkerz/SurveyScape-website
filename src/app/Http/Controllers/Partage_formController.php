<?php

namespace App\Http\Controllers;

use App\Amis;
use App\Formulaire;
use App\Partage_form;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Partage_formController extends Controller
{
    public function partage(Request $request) {
        $user_id = Auth::id();
        $form_id = $request->input('form_id');

        $inputs = $request->input();
        $i=0;
        foreach ($inputs as $input=>$value) {
            if(strpos($input,"id_friend") !== false) {
                Partage_form::create([
                    "user_id" => $request->input($input),
                    "formulaire_id" => $form_id,
                ]);
            }
        }

        return back();
    }

    public function delete(Request $request) {
        if ($request->ajax()) {
            $form = $request;
//            $formulaire_id = Formulaire::where('name', '=', $form)->pluck('id');
//            $partage = Partage_form::where('formulaire_id', "=", $formulaire_id)
//                ->where("user_id", "=", Auth::id());
//            $partage->notif = '0';
//            $partage->save();
            response()->json(['delete'=> $form],200);
        }
        abort(404);
    }
}
