<?php

namespace App\Http\Controllers;

use App\Amis;
use App\Formulaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        /* Formulaires */
        $formulaires = Formulaire::all() -> where('user_id', $user_id);
        $nbr_form = sizeof($formulaires);


        /* Amis */
        $Amis = Amis::where('user1', '=', $user_id)
            ->where('pending', '=', 1)
            ->orWhere('user2', '=', $user_id)
            ->where('pending', '=', 1)
            ->get();
        $nbr_amis = sizeof($Amis);


        /* Notification */
        $list = Amis::where('user2', '=', $user_id)
            ->where('pending', '=', 0)
            ->get();
        $size_ami = sizeof($list);

        $nbr_notif=$size_ami;

        return view('home',compact('nbr_form','nbr_amis','nbr_notif'));

    }
}
