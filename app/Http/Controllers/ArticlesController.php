<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use Carbon\Carbon;
use App\Messages;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Articles::orderBy('created_at', 'DESC')->paginate(10);

        return view('articles', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
        return view('create_articles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required|min:300',
            'miniature' => 'required|image',
        ]);

        $path = request('miniature')->store('miniatures', 'public');

        Articles::create([
            'titre' => request('title'),
            'description' => request('description'),
            'type_articles' => request('type_articles'),
            'miniature' => $path,
            'slug' => str_slug(request('title'), '-'),
            'redactor_pseudo' => auth()->user()->pseudo,
        ]);

        flash('Votre article a bien été crée')->success();

        return back();

    }

    public function storeMessages(Request $request) {


        $request->validate([
            'message' => 'required',
        ]);

        Messages::create([
            'message' => request('message'),
            'membre_pseudo' => auth()->user()->pseudo,
            'membre_avatar' => auth()->user()->avatar,
        ]); 

        flash('Votre message a bien été posté')->success();

       return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $article_infos = Articles::all()->where('slug', $id)->first();

        return view('article', [
            'article_infos' => $article_infos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = Articles::find($id);

        return view('edition-profil', [
            'articles' => $articles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Validation
        $request->validate([
            'description' => 'nullable|min:300',
            'miniature' => 'nullable',
            'type_articles' => 'nullable',
        ]);

        //Trouver un article qui possede cette id pour ensuite le modifier
        $updated_article = Articles::findOrFail($id);
        
        //Si miniature n'est pas null le modifier sinon laisser sa valeur d'origine
        if(request('miniature') != null) {
            $path = request('miniature')->store('miniatures', 'public');
        } else {
            $path = $updated_article->miniature;
        }

        //Mettre a jour les valeurs
        $updated_article->update([
            'titre' => request('title'),
            'description' => request('description'),
            'type_articles' => request('type_articles'),
            'miniature' => $path,
            'slug', str_slug(request('title'), '-'),
        ]);

        flash('Votre article a été modifié avec succès')->success();

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_article = Articles::findOrFail($id);

        $destroy_article->delete();

        flash('L\'article a bien été supprimé avec succès')->success();

        return back();
    }
}
