@extends('templates.base')

@section('content')

	<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;">
		

		  <h2 style="font-family: 'Raleway', sans-serif;" class="all_articles_title"><i class="fas fa-newspaper"></i> Tous les articles: <h5 style="font-family: 'Roboto Condensed', sans-serif;">Tous les articles postés seront affichés ici, vous pouvez faire une recherche ou voir les derniers articles publiés a l'instant</h5></h2>


		   <form method="get" action="articlesFound" style="border-bottom: 1px solid grey;">
				<input type="search" name="q" placeholder="Rechercher un article..." id="recherche_articles" class="form-control">
				<input type="submit" id="recherche_articles" placeholder="Rechercher un article..." class="btn button-submit-search" style="margin: 10px 0px" value="Rechercher">
		   </form>

		   <?php 
		   	
		   	setlocale(LC_TIME, 'French');

		   ?>

		   {{-- Tous les articles --}}
		   @foreach($articles as $article)

		   	<div class="content-article" style="padding: 30px;border-bottom: 1px solid grey">

		   		<h5 style="font-family: 'Roboto Condensed', sans-serif;">{{ ucfirst($article->created_at->formatLocalized('%A %d %B %Y à %H h %M min')) }}</h5>

		   		<h5 style="font-family: 'Roboto Condensed', sans-serif;"><b>Publié par:</b> <a href="profile/{{ $article->redactor_pseudo }}">{{ $article->redactor_pseudo }}</h5></a>

		   		<h5 style="font-family: 'Roboto Condensed', sans-serif;">Catégorie:

			   	@if($article->type_articles == 'Programmation')
			   		<i class="fas fa-code"></i>
			   	@elseif($article->type_articles == 'Sécurité Informatique')
			   		<i class="fas fa-lock"></i>
			   	@elseif($article->type_articles == 'Systemes d\'exploitation')
			   		<i class="fas fa-laptop"></i>
			   	@else
			   		<i class="fas fa-asterisk"></i>
			   	@endif

			   	{{ $article->type_articles }}</h5>

			   	<a href="articles/{{ $article->slug }}" style="text-decoration: none;"><h3 style="font-family: 'Raleway', sans-serif;">{{ $article->titre }}</h3></a>
	
			   	
			   	<img src="/storage/{{ $article->miniature }}" width="500" class="img-responsive" style="border: 1px solid black">
		    </div>

		   @endforeach


		   {{ $articles->links() }}

 
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>
	    <br>

	</div>

	

@endsection