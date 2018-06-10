@extends('templates.base')

@section('content')


	<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;padding: 20px;">

			@include('flash::message')
		

			<h2 style="font-family: 'Raleway', sans-serif;">Créer un article:</h2>


			<form method="post" action="{{ route('articles.store') }}" style="margin-top: 10px;" enctype="multipart/form-data">

			{{ csrf_field() }}
			
			
			<label>Titre: </label>
			<input type="text" name="title" placeholder="Le titre de l'article..." id="title" class="form-control" value="{{ old('title') }}">

			@if($errors->has('title'))
					<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('title') }}</p>
				@endif


			<br>

			
			<label>Description: <p style="color: red;">N'hesitez pas a cliquer sur le Markdown Guide de l'editeur pour  en savoir plus sur le markdown et personnaliser plus votre article (le petit icone point d'interrogation)</p></label>
			<textarea name="description" placeholder="Contenu de l'article..." id="simplemde" class="form-control" style="height: 250px;resize: none;">{{ old('description') }}</textarea>

			@if($errors->has('description'))
					<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('description') }}</p>
				@endif


			<br>

	
			<label>Choisir une image: </label>
				<input type="file" name="miniature" id="miniature" class="form-control btn btn-info">

			@if($errors->has('miniature'))
				<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('miniature') }}</p>
			@endif


			<br>

			<label>Choisir le type d'articles: </label>
			<select name="type_articles" id="type_articles" class="form-control">
				<option>Programmation</option>
				<option>Sécurité Informatique</option>
				<option>Systemes d'exploitation</option>
				<option>Autres</option>
			</select>

			<br>

			<input type="submit" name="form-articles" value="Créer un article" class="btn button-submit">


	</form>



	</div>

	 <script>
   $(document).ready(function() { 

   var simplemde = new SimpleMDE({ 
      element: $("#simplemde")[0],
      spellChecker: false
    });

  });

 </script>


@endsection