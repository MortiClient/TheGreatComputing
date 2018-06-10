@extends('templates.base')


@section('content')


	<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;">

	<h2 style="font-family: 'Raleway', sans-serif;" class="all_articles_title"><i class="fas fa-newspaper"></i> Tous les articles: <h5 style="font-family: 'Roboto Condensed', sans-serif;">Tous les articles postés seront affichés ici, vous pouvez faire une recherche ou voir les derniers articles publiés a l'instant</h5></h2>


	<form method="get" action="articlesFound" style="border-bottom: 1px solid grey;">
		<input type="search" name="q" placeholder="Rechercher un article..." id="recherche_articles" class="form-control">
		<input type="submit" id="recherche_articles" placeholder="Rechercher un article..." class="btn button-submit-search" style="margin: 10px 0px" value="Rechercher">
	</form>
		

		<h2 style="font-family: 'Raleway', sans-serif;">Tous les resultats: {{ count($articlesFound)  }}</h2>


	

			@forelse($articlesFound as $articleFound)

				<div class="content-article" style="padding: 30px;border-bottom: 1px solid grey">

			   		
			   		<h5 style="font-family: 'Roboto Condensed', sans-serif;">{{ ucfirst($articleFound->created_at->formatLocalized('%A %d %B %Y à %H h %M min')) }}</h5>


			   		<h5 style="font-family: 'Roboto Condensed', sans-serif;"><b>Publié par:</b> <a href="profile/{{ $articleFound->redactor_pseudo }}">{{ $articleFound->redactor_pseudo }}</h5></a>



			   		<h5 style="font-family: 'Roboto Condensed', sans-serif;">Catégorie:

				   	@if($articleFound->type_articles == 'Programmation')
				   		<i class="fas fa-code"></i>
				   	@elseif($articleFound->type_articles == 'Sécurité Informatique')
				   		<i class="fas fa-lock"></i>
				   	@elseif($articleFound->type_articles == 'Systemes d\'exploitation')
				   		<i class="fas fa-laptop"></i>
				   	@else
				   		<i class="fas fa-asterisk"></i>
				   	@endif
				   	

				   	{{ $articleFound->type_articles }}</h5>

				   	<a href="articles/{{ $articleFound->slug }}" style="text-decoration: none;"><h3 style="font-family: 'Raleway', sans-serif;">{{ $articleFound->titre }}</h3></a>
		
				   	
				   	<img src="/storage/{{ $articleFound->miniature }}" width="500" class="img-responsive" style="border: 1px solid black">
				   	
			    </div>

			@empty


			<h3 style="font-family: 'Raleway', sans-serif;text-align: center;">{{ 'Aucun article n\'a été trouvé' }}</h3>

			<img src="https://media.giphy.com/media/l378lrNMtCj4tfyRa/giphy.gif" class="center-block img-responsive">

@endforelse
	

	<br>
	<br>
	<br>
	<br>
	


	</div>






@endsection