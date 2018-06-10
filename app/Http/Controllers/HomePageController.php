<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membres;
use App\Articles;

class HomePageController extends Controller
{
    public function index() {

    	$article = Articles::orderBy('created_at', 'DESC')->first();
    	$membres = Membres::all()->first();

    	return view('/accueil', [
    		'article' => $article,
    		'membres' => $membres,
    	]);
    }
}
