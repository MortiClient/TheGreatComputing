@extends('templates.base')


	@section('content')


		<?php

			use App\Articles;

			$articles = Articles::orderBy('created_at', 'DESC')->first();

		?>



		<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;">
			


				<h2 style="font-family: 'Raleway', sans-serif;">Dernier article: </h2>


				<h2 style="font-family: 'Raleway', sans-serif;text-align: center;">{{ $articles->titre }}<h2>

				<h4 style="font-family: 'Roboto Condensed', sans-serif;text-align: center;"><span style="font-weight: bold;">Catégorie:</span> 

				   	@if($articles->type_articles == 'Programmation')
				   		<i class="fas fa-code"></i>
				   	@elseif($articles->type_articles == 'Sécurité Informatique')
				   		<i class="fas fa-lock"></i>
				   	@elseif($articles->type_articles == 'Systemes d\'exploitation')
				   		<i class="fas fa-laptop"></i>
				   	@else
				   		<i class="fas fa-asterisk"></i>
				   	@endif

				   	{{ $articles->type_articles }} | <span style="font-weight: bold;">Date:</span> {{ ucfirst($articles->created_at->formatLocalized('%A %d %B %Y à %H h %M min')) }} | <b>Par:</b> <a href="../profile/{{ $articles->redactor_pseudo }}">{{ $articles->redactor_pseudo }}</a></h4>

			<img src="/storage/{{ $articles->miniature }}" class="img-responsive center-block" style="width: 80%;">
			   <br>
			   <br>
			   <br>

		</div>



	@endsection
