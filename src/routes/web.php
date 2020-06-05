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
use Illuminate\Support\Facades\Route;


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
    Route::resource('/Amis', 'AmisController');
    Route::get('/accueil', 'AccueilController@index')->name('accueil');


    /* Amis */


    /* Accepter et refuser demandes d'amis */
    Route::post('/accepterAmi', 'AmisController@accepter')->name('accepterAmi');
    Route::post('/refuserAmi', 'AmisController@refuser')->name('refuserAmi');

    /* Ajax supprimer amis */
    Route::post('/Delete_friend', 'AmisController@delete_friend')->name('Delete_friend');

    /* Ajax indicateur Notifications */
    Route::get('/notifications-push', 'NotificationspushController@notifpush')->name('notifications-push');

    /* Ajax liste notifications demande d'amis */
    Route::get('/notifications', 'NotificationspushController@notifications')->name('notifications');

});

