@extends('templates.base')

@section('content')

	<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;">

	<h3 style="font-family: 'Montserrat', sans-serif;text-align: center;">Connexion et Inscription</h3>

	{{-- Information --}}
	<div class="alert alert-info information-inscription">
			<h4 style="font-family: 'Roboto Condensed', sans-serif;" class="title-information-inscription">Petite information avant de s'inscrire   <img src="{{ asset('images/cross_icon.png') }}" width="30" style="float: right;margin-top: -15px;cursor: pointer;" id="img-cross-icon"></h4>
			<p class="text-information-inscription">En vous inscrivant vous pourrez pas automatiquement poster des articles, il faudra demander aux administrateurs de ce blog. C'est une securité pour éviter des articles indésirables de certains internautes.</p>
	</div>
	


	{{-- Inscription --}}
	<h4 style="font-family: 'Raleway', sans-serif;border-top: 1px solid grey;padding: 10px 0px;">S'inscrire:</h4>

	<form method="post" action="inscription" style="margin-top: -12px;">

		{{ csrf_field() }}
		
		<label>Pseudo: </label>
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" name="pseudo" placeholder="Votre pseudo..." id="pseudo" class="form-control" value="{{ old('pseudo') }}">
		</div>

		@if($errors->has('pseudo'))
				<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('pseudo') }}</p>
			@endif

		<br>

		<label>Email: </label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fas fa-at"></i></span>
			<input type="email" name="email" placeholder="Votre email..." id="email" class="form-control" value="{{ old('email') }}">
		</div>

		@if($errors->has('email'))
				<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('email') }}</p>
			@endif

		<br>

		<label>Mot de passe: </label>
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="password" placeholder="Votre mot de passe..." id="password" class="form-control">
		</div>

		@if($errors->has('password'))
				<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('password') }}</p>
			@endif

		<br>

		<label>Confirmation du mot de passe: </label>
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="password_confirmation" placeholder="Confirmez votre mot de passe..." id="password_confirmation" class="form-control">
		</div>

		@if($errors->has('password'))
				<p style="color: red;font-family: 'Roboto Condensed', sans-serif;">{{ $errors->first('password') }}</p>
			@endif

		<br>

		<input type="submit" name="form-inscription" value="S'inscrire" class="btn button-submit">


	</form>

	<br>
	<a href="connexion">Déjà inscrit(e) ? Se connecter</a>

	<br>
	<br>
	@include('flash::message')

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
		$(document).ready(

				$('#img-cross-icon').on('click', function() {
					$('.information-inscription').fadeOut(400);
				})


			);
	</script>


@endsection