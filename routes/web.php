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

/* Route hors middleware auth */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listeFormulaire', 'ListeFormulaireController@list')->name('listeFormulaire');
Route::get('/repondre/{token}', 'ReponseController@repondre');
Route::post('/repondre/send', 'ReponseController@envoyer')->name('envoyer_reponse');
Route::get('/conditions-utilisations', function() {return view('conditions.index');})->name('conditions_utilisations');
Route::get('/equipe-de-direction', function() {return view('direction.index');})->name('equipe_de_direction');
Route::get('/politique-de-confidentialite', function() {return view('confidentialite.index');})->name('politique_de_confidentialite');


Route::group(['middleware' => ['auth']], function () {


    /* Scripts modifications profil */
    Route::post('profil_updateAvatar', 'UserController@update_avatar')->name('update_avatar');
    Route::patch('profil_updatePassword', 'UserController@update_password')->name('update_password');

    /* Controllers resource */
    Route::resource('/formulaires', 'FormulaireController');
    Route::resource('/rubriques', 'RubriqueController');
    Route::resource('/questions', 'QuestionController');
    Route::resource('/type_reponses', 'TypeReponseController');
    Route::resource('/questions', 'QuestionController');
    Route::resource('/profil', 'UserController');
    Route::resource('/Amis', 'AmisController');



    /* Amis et notifications */

    /* Accepter et refuser demandes d'amis */
    Route::post('/accepterAmi', 'AmisController@accepter')->name('accepterAmi');
    Route::post('/refuserAmi', 'AmisController@refuser')->name('refuserAmi');
    /* Ajax supprimer amis */
    Route::post('/Delete_friend', 'AmisController@delete_friend')->name('Delete_friend');
    /* Ajax indicateur Notifications */
    Route::get('/notifications-push', 'NotificationspushController@notifpush')->name('notifications-push');
    /* Ajax liste notifications demande d'amis */
    Route::get('/notifications', 'NotificationspushController@notifications')->name('notifications');
    /* Ajax liste notifications partage de formulaire */
    Route::get('/notifications_partage_form', 'NotificationspushController@notifications_partage_form')->name('notifications_partage_form');
    /* partage de formulaire avec ses amis */
    Route::post('/partageform', 'Partage_formController@partage')->name('partageform');
    Route::post('/deleteNotif', 'Partage_formController@delete')->name('partageform_delete');



    /* Scripts specifiques formulaires */

    /* Delete choice */
    Route::post('/delete_choice', 'QuestionController@delete_choice')->name('delete_choice');
    /* Delete question */
    Route::post('/delete_question', 'QuestionController@delete_question')->name('delete_question');
    /* Delete Form */
    Route::post('/delete_form', 'FormulaireController@delete_form')->name('delete_form');
    /*ajax upload background */
    Route::post('/formulaire/background', 'FormulaireController@upload_background')->name('form_background');
    /* Update formulaire */
    Route::post('/update_form', 'FormulaireController@update_form')->name('update_form');

});

