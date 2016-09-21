<div id="top">
	<nav id="hub-navbar" class="navbar navbar-inverse">
		<div class="container-fluid">
			<a href="/">
				<div id="hub-navbar-picture" class="navbar-header"></div>
				<div class="navbar-header">
					<span class="navbar-brand">{ HUB Marseille. }</span>
				</div>
			</a>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/">Accueil</a></li>
				<li><a href="/articles">Articles</a></li>
				<li><a href="/">Projets</a></li>
				<li><a href="/">Calendrier</a></li>
				<li><a href="/team">L'équipe</a></li>
				@if (session('intraInstance') and intra()->isHubMember())
					<li><a href="/backoffice">BackOffice</a></li>
				@endif
				<li>
					@if (session('intraInstance') and intra()->isAuthenticated())
						<a href="/logout">Déconnexion</a>
					@else
						<a href="/login">Connexion</a>
					@endif
				</li>
			</ul>
		</div>
	</nav>
</div>