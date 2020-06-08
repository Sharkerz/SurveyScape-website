<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListeFormulaireController extends Controller
{
    function list() {
        return view('listeForm.index');
    }
}
