<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membres;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    public function formulaire() {
    	return view('inscription');
    }

    public function traitement() {

	    request()->validate([
	        'pseudo' => ['required', 'unique:membres'],
	        'email' => ['required', 'email'],
	        'password' => 'required|confirmed|min:8',
	    ]);

		$membres = Membres::create([
			'pseudo' => request('pseudo'),
			'email' => request('email'),
			'password' => bcrypt(request('password')),
		]);

		flash('Votre compte a bien été crée')->success();

		return redirect('inscription');

    }
}

