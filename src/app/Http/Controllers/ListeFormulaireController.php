<?php

namespace App\Http\Controllers;

use App\Formulaire;
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

        return view('listeForm.index', ['formulaires' => $formulaires]);
    }
}
