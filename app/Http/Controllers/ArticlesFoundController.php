<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Membres;

class ArticlesFoundController extends Controller
{
    public function search() {

       $articlesFound = Articles::where('titre', 'LIKE', '%'.request('q').'%')->get();

        return view('articlesFound', [
            'articlesFound' => $articlesFound,
        ]);
    }
}
