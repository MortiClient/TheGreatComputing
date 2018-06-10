@extends('templates.base')


@section('content')

	<div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;">

		<br>

		@include('flash::message')

	{{-- Formulaire de connexion --}}
	<h2 style="font-family: 'Raleway', sans-serif;">Se connecter:</h2>

	<form method="post" action="/connexion" style="margin-top: 65px;">

		{{ csrf_field() }}
		
		<label>Email: </label>
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="email" name="email" placeholder="Votre email..." id="email" class="form-control">
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

		<input type="submit" name="form-connexion" value="Se connecter" class="btn button-submit">
		
	</form>

	

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