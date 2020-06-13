<?php

namespace App\Http\Controllers;

use App\Amis;
use App\Formulaire;
use App\Partage_form;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationspushController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notifpush(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::id();

            /* Liste des demandes d'amis */
            $list = Amis::where('user2', '=', $user_id)
                ->where('pending', '=', 0)
                ->get();
            $size_ami = sizeof($list);


            /* Renvoie notif:yes si il y a au moins une demande en attente. */
            if($size_ami == 0) {
                return response()->json(['notif'=>'no'],200);
            }
            else {
                return response()->json(['notif'=>'yes'],200);
            }
        }
        abort(404);
    }

    public function notifications(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::id();

            /* Liste des demandes d'amis */
            $list = Amis::where('user2', '=', $user_id)
                ->where('pending', '=', 0)
                ->get();

            $id_amis = [];

            for($i = 0; $i <= count($list)-1; $i++) {
                array_push($id_amis, $list[$i]['user1']);
            }

            $name = [];

            foreach ($id_amis as $id_ami) {
                $name[$id_ami] = User::where('id', '=', $id_ami)->first()->name;
            }

            //Formulaire qu'on nous a partagés
            $partages = Partage_form::all() ->where('user_id', '=', Auth::id());
            $tab_partages = [];
            foreach ($partages as $partage) {
                $form = Formulaire::all()->where('id', '=', $partage->formulaire_id);
                array_push($tab_partages, $form);
            }


                return response()->json(['id'=>$id_amis, 'name'=>$name, 'forms'=>$tab_partages],200);

        }
        abort(404);
    }

}
