@extends('templates.base')


@section('content')


	<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;">

		<br>
		@include('flash::message')

		
		<div class="contain-profile">

		@if(auth()->check())
			@if(Auth::user()->id == $membres->id)
				<h2 style="font-family: 'Raleway', sans-serif;text-align: center;">Mon profil:</h2>
			@else
				<h2 style="font-family: 'Raleway', sans-serif;text-align: center;">Le profil de:</h2>
			@endif

		@else
			<h2 style="font-family: 'Raleway', sans-serif;text-align: center;">Le profil de:</h2>	

		@endif


		<div style="margin: 20px auto;text-align: center;">

			@if(is_null($membres->avatar))
				<img src="{{ asset('images/default-avatar.png') }}" width="150" style="border-radius: 80px;" class="center-block img-responsive">
			@else
				<img src="/storage/{{ $membres->avatar }}" width="150" style="border-radius: 70px;" class="center-block img-responsive" alt="avatar">
			@endif

			<h4>
				<span style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">Pseudo:</span> {{ $membres->pseudo }} 

				@if($membres->is_redactor)
					<i class="far fa-check-circle" data-toggle="tooltip" title="Certifié rédacteur"></i>
				@elseif($membres->is_admin)
					<span class="glyphicon glyphicon-king" data-toggle="tooltip" title="Administrateur"></span>
				@endif
			</h4>
			
			@if(Auth::user()->id == $membres->id)
			
			<h4><span style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;"><span class="glyphicon glyphicon-envelope"></span> Email:</span>{{ $membres->email }}</h4>
			
			@endif

			@if($membres->is_redactor)
				<h4><span style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">Role:</span> Rédacteur</h4>
			@elseif($membres->is_admin)
				<h4><span style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">Role:</span> Administrateur</h4>
			@else
				<h4><span style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">Role:</span> Membre</h4>
			@endif

				</div>
email
			<br>
			<br>


			@if(auth()->check())

				@if(Auth::user()->id == $membres->id)

					<h3 style="font-family: 'Raleway', sans-serif;">Modifier l'avatar: </h3>

					<br>

					{{-- Formulaire edit --}}
					<form method="post" action="/profile" id="form_edit_profile" enctype="multipart/form-data">
						{{ csrf_field() }}

						<input type="file" name="avatar" id="avatar" class="form-control center-block">

						@if($errors->has('avatar'))
							<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('avatar') }}</p>
						@endif
						
						<br>

						<input type="submit" name="form-inscription" value="Modifier" class="btn button-submit">


					</form>

				@endif
			@endif


			<br>
			<br>


			@if(auth()->check())

				@if(Auth::user()->id == $membres->id)
					<h3 style="font-family: 'Raleway', sans-serif;">Mes articles:</h3>
				@else
					<h3 style="font-family: 'Raleway', sans-serif;">Ses articles:</h3>
				@endif

				@else
					<h3 style="font-family: 'Raleway', sans-serif;">Ses articles:</h3>
			@endif
	
			@foreach($articles_user as $article_user)
				<div style="display: inline-block;padding: 30px;">

					<a href="/articles/{{ $article_user->slug }}" style="text-decoration: none;"><h4 style="font-family: 'Roboto Condensed', sans-serif;">{{ $article_user->titre }}<h4></a>

					<h5 style="font-family: 'Roboto Condensed', sans-serif;">{{ ucfirst($article_user->created_at->formatLocalized('%A %d %B %Y à %H h %M min')) }}</h5>

					<h5 style="font-family: 'Roboto Condensed', sans-serif;">Catégorie:

					   	@if($article_user->type_articles == 'Programmation')
					   		<i class="fas fa-code"></i>
					   	@elseif($article_user->type_articles == 'Sécurité Informatique')
					   		<i class="fas fa-lock"></i>
					   	@elseif($article_user->type_articles == 'Systemes d\'exploitation')
					   		<i class="fas fa-laptop"></i>
					   	@else
					   		<i class="fas fa-asterisk"></i>
					   	@endif

			   			{{ $article_user->type_articles }}</h5>

			   			@if(auth()->check())
			   			@if(Auth::user()->id == $membres->id)

			   				<div style="display: flex;justify-content: space-around;margin-left: -10px" class="content-buttons-action">
				   			
				   			<a href="/articles/{{ $article_user->id }}/edit" class="btn button-submit">Modifier l'article</a>
				   			
				   			
				   			<form method="POST" action="{{ route('articles.destroy', $article_user->id) }}">
				   				{{ method_field('DELETE') }}
				   				{{ csrf_field() }}

				   				<input type="submit" class="btn button-suppress" value="Supprimer l'article">
				   			</div>
				   			</p>
				   			
			   			@endif
			   			@endif


					<img src="/storage/{{ $article_user->miniature }}" width="300" height="300" style="border: 1px solid black;margin-top: 10px" class="img-responsive">
				</div>
					
				@endforeach
				


			</div>


			{{ $articles_user->links() }}

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


	<script>
		$(document).ready(function(){
    		$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>


@endsection
