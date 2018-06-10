<header id="fond_menu">

	<h1 class="title-website"><a href="/accueil" style="text-decoration: none;color: #fff;">TheGreatComputing</a></h1>
	<nav id="menu">
		<ul>
			@if(auth()->check())
				<li><a href="../deconnexion"><i class="fas fa-sign-out-alt"></i> DECONNEXION</a></li>
			@if(Auth::user()['is_redactor'] OR Auth::user()['is_admin'])
				<li><a href="{{ route('articles.create') }}"><i class="fas fa-pencil-alt"></i> CREER UN ARTICLE</a></li>
			@endif
				<li><a href="/profile/{{ Auth::user()->pseudo }}"><span class="glyphicon glyphicon-user"></span> MON COMPTE</a></li>
			@endif
				<li><a href="../articles">TOUS LES ARTICLES</a></li>
			<li><a href="../inscription">INSCRIPTION</a></li>
			@if(!auth()->check())
				<li><a href="../connexion">CONNEXION</a></li>
			@endif
			<li><a href="/accueil"><i class="fas fa-home"></i> ACCUEIL</a></li>
		</ul>
	</nav>

	<img src="{{ asset('images/hamburger_icon.png') }}" alt="hamburger icon" id="img-icon-hamburger" width="30" class="img-icon-hamburger" onclick="sideBar()">



</header>

<script>
	
	function sideBar() {
		document.getElementById('menu').classList.toggle('active');
	}

</script>
