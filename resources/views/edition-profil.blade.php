 @extends('templates.base')




 @section('content')


 		<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;">
 			
 			<br>
 				
 				@include('flash::message')
 			


			<h2 style="font-family: 'Raleway', sans-serif;">Modifier l'article : <b><a href="/articles/{{ $articles->slug }}" style="text-decoration: none;">{{ $articles->titre }}</a></b></h2>


			<form method="post" action="../{{ $articles->id }}" style="margin-top: 10px;" enctype="multipart/form-data">

			{{ method_field('PUT') }}
			{{ csrf_field() }}
			
			
			<label>Titre: </label>
			<input type="text" name="title" placeholder="Modifier le titre de l'article..." id="title" class="form-control" value="{{ $articles->titre }}">

			@if($errors->has('title'))
					<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('title') }}</p>
				@endif


			<br>

			
			<label>Description: <p style="color: red;">N'hesitez pas a cliquer sur le Markdown Guide de l'editeur pour en savoir plus sur le markdown et personnaliser plus votre article (le petit icone point d'interrogation)</p></label>
			<textarea name="description" placeholder="Modifier le contenu de l'article..." id="simplemde" class="form-control" style="height: 250px;resize: none;">{{ $articles->description }}</textarea>

			@if($errors->has('description'))
					<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('description') }}</p>
				@endif


			<br>

	
			<label>Modifier la miniature: </label>
				<input type="file" name="miniature" id="miniature" class="form-control btn btn-info">

			@if($errors->has('miniature'))
				<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('miniature') }}</p>
			@endif


			<br>

			<label>Modifier le type d'articles: </label>
			<select name="type_articles" id="type_articles" class="form-control">
				<option selected="{{ $articles->type_articles }}">Programmation</option>
				<option selected="{{ $articles->type_articles }}">Sécurité Informatique</option>
				<option selected="{{ $articles->type_articles }}">Systemes d'exploitation</option>
				<option selected="{{ $articles->type_articles }}">Autres</option>
			</select>

			<br>

			<input type="submit" name="form-articles" value="Modifier l'article" class="btn button-submit">


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