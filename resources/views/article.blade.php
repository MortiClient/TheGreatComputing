@extends('templates.base')


@section('content')

	   <?php 

	   	 $Parsedown = new Parsedown();
		   	
		  setlocale(LC_TIME, 'French');

		 use App\Messages;

		 $messages = Messages::orderBy('created_at', 'DESC')->paginate(25);


		 ?>

	<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;">
		
		<h2 style="font-family: 'Raleway', sans-serif;text-align: center;">{{ $article_infos->titre }}<h2>

			<h4 style="font-family: 'Roboto Condensed', sans-serif;text-align: center;"><span style="font-weight: bold;">Catégorie:</span> 

			   	@if($article_infos->type_articles == 'Programmation')
			   		<i class="fas fa-code"></i>
			   	@elseif($article_infos->type_articles == 'Sécurité Informatique')
			   		<i class="fas fa-lock"></i>
			   	@elseif($article_infos->type_articles == 'Systemes d\'exploitation')
			   		<i class="fas fa-laptop"></i>
			   	@else
			   		<i class="fas fa-asterisk"></i>
			   	@endif

			   	{{ $article_infos->type_articles }} | <span style="font-weight: bold;">Date:</span> {{ ucfirst($article_infos->created_at->formatLocalized('%A %d %B %Y à %H h %M min')) }} | <b>Par:</b> <a href="../profile/{{ $article_infos->redactor_pseudo }}">{{ $article_infos->redactor_pseudo }}</a></h4>

		<img src="/storage/{{ $article_infos->miniature }}" class="img-responsive center-block" style="width: 80%;">

		<div style="padding: 20px">

			<p style="word-break: break-all;">{!! $Parsedown->text($article_infos->description) !!}</p>

		</div>
		

		<br>
		<br>
		<br>

		@if(auth()->check())

		<h3 style="font-family: 'Raleway', sans-serif;">Donner son avis:</h3>

			<form method="post" action="/articles/storeMessages">

				 {{ csrf_field() }}
				
				<textarea name="message" placeholder="Envoyer un message..." class="form-control" style="resize: none;height: 250px">{{ old('message') }}</textarea>

				@if($errors->has('message'))
					<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('message') }}</p>
				@endif

				<br>

				<input type="submit" name="form-messages" value="Envoyer message" class="btn button-submit">

			</form>

			<br> 

			@include('flash::message')

			<h3 style="font-family: 'Raleway', sans-serif;">Tous les messages: {{ $messages->total() }}</h3>

				@forelse($messages as $message)

						<div style="border-bottom: 1px solid grey;padding: 25px;">
							
							<h4 style="font-family: 'Roboto Condensed', sans-serif;">
								
								<img src="/storage/{{ $message->membre_avatar }}" width="30" style="border-radius: 80px;"> 
								<a href="/profile/{{ $message->membre_pseudo }}" style="text-decoration: none;">{{ $message->membre_pseudo }}</a>
								
								<p style="font-family: 'Roboto Condensed', sans-serif;font-size: 15px;margin-top: 5px">
									{{ ucfirst($message->created_at->formatLocalized('%A %d %B %Y à %H h %M min')) }}
								</p>
							</h4>
							<p>{{  $message->message }}</p>

						</div>



						@empty


							<h4 style="text-align: center;font-family: 'Raleway', sans-serif;">Aucun message n'a été posté soit le premier a en poster</h4>


				@endforelse

				{{ $messages->links() }}


			@endif
	

	</div>


@endsection