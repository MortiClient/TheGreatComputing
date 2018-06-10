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

Route::get('/accueil', 'HomePageController@index');

Route::view('/articles', 'articles');
Route::view('/last-article', 'last-article');


Route::group([
		'middleware' => 'App\Http\Middleware\Auth',
], function() {

	Route::view('/edition-profil', 'edition-profil');
});



Route::get('/inscription', 'InscriptionController@formulaire'); 
Route::post('/inscription', 'InscriptionController@traitement');

Route::get('/connexion', 'ConnexionController@formulaire'); 
Route::post('/connexion', 'ConnexionController@traitement');

Route::post('/profile', 'CompteController@modificationAvatar');
Route::post('/articles/storeMessages', 'ArticlesController@storeMessages');

Route::get('/profile', 'CompteController@accueil');
Route::get('/deconnexion', 'CompteController@deconnexion');
Route::get('/profile/{pseudo}', 'CompteController@show');

Route::resource('/articles', 'ArticlesController');

Route::get('/articlesFound', 'ArticlesFoundController@search');