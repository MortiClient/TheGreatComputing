<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{

	public function formulaire() {

		return view('connexion');
	}

    public function traitement() {

    	
        request()->validate([
    		'email' => ['required', 'email'],
    		'password' => ['required'],
    	]);

    	$resultat = auth()->attempt([
    		'email' => request('email'),
    		'password' => request('password'),
    	]);

    	if ($resultat == true) {
            flash('Connexion au compte avec succès')->success();

    		return redirect('/accueil');
    	} 

    	return back()->withErrors([
    		'password' => 'Vos identifiants sont incorrects'
    	]);




    }
}
