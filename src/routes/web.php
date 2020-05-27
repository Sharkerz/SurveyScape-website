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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {

    Route::post('profil_updateAvatar', 'UserController@update_avatar')->name('update_avatar');
    Route::patch('profil_updatePassword', 'UserController@update_password')->name('update_password');

    Route::resource('/formulaires', 'FormulaireController');
    Route::resource('/rubriques', 'RubriqueController');
    Route::resource('/questions', 'QuestionController');
    Route::resource('/type_reponses', 'TypeReponseController');
    Route::resource('/questions', 'QuestionController');
    Route::resource('/profil', 'UserController');
    Route::get('/accueil', 'AccueilController@index')->name('accueil');
});

