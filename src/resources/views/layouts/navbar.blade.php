<div id="top">
	<nav id="hub-navbar" class="navbar navbar-inverse">
		<div class="container-fluid">
			<a href="{{ url('/') }}">
				<div id="hub-navbar-picture" class="navbar-header"></div>
				<div class="navbar-header">
					<span class="navbar-brand">{ HUB Marseille. }</span>
				</div>
			</a>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('/') }}">Accueil</a></li>
				<li><a href="{{ url('/articles') }}">Articles</a></li>
				<li><a href="{{ url('/projects') }}">Projets</a></li>
				<li><a href="{{ url('/') }}">Calendrier</a></li>
				<li><a href="{{ url('/team') }}">L'équipe</a></li>
				@if (session('intraInstance') and intra()->isHubMember())
					<li><a href="{{ url('/backoffice') }}">BackOffice</a></li>
				@endif
				<li>
					@if (session('intraInstance') and intra()->isAuthenticated())
						<a href="{{ url('/logout') }}">Déconnexion</a>
					@else
						<a href="{{ url('/login') }}">Connexion</a>
					@endif
				</li>/team
			</ul>
		</div>
	</nav>
</div>