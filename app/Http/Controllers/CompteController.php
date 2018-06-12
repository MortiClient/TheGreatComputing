<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membres;
use App\Articles;

class CompteController extends Controller
{
    
    public function accueil() {

    	/*Si l'utilisateur est un invité*/

    	if (auth()->guest()) {

            flash("Vous devez etre connecté pour avoir accès a cette page")->error();

    		return redirect('/connexion');
    	}
    	return view('profile');

    }



    public function deconnexion() {

        flash('Déconnexion du compte avec succès')->success();

    	auth()->logout();

    	return redirect('/');
    }


    public function show() {

        $pseudo = request('pseudo');

        $membres = Membres::where('pseudo', $pseudo)->first();
        //Afficher articles en fonction de l'utilisateur connecté
        $articles_user = Articles::where('redactor_pseudo', $pseudo)->paginate(3);

        return view('profile', [
            'membres' => $membres,
            'articles_user' => $articles_user,
        ]);
    }


    public function modificationAvatar() {

        request()->validate([
           'avatar' => 'required|image',
        ]);

        $path = request('avatar')->store('avatars', 'public');

        auth()->user()->update([
            'avatar' => $path,
        ]);


        flash('Votre avatar a été modifié avec succès')->success();

       return back();
    }
}
