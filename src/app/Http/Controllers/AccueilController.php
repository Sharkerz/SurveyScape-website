<?php

namespace App\Http\Controllers;

use App\Formulaire;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {

        return view('accueil.index');

    }
}
