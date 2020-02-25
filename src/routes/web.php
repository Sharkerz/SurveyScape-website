<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Formulaire;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return Formulaire::find(2)->rubriques[0]->formulaire;
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
