@extends('layouts.default')

@section('title', 'Accueil')
@section('content')
	<ul class="breadcrumb">
		<li class="active">Accueil</li>
	</ul>
	<div class="jumbotron">
		<h1>Intra HUB Marseille</h1>
		<p>L’<strong>EPITECH Innovation HUB</strong> est une forme innovante de collaboration entre étudiants, experts et entreprises,
		   qui partagent et appliquent leurs compétences dans la fabrication de solutions technologiques novatrices.</p>
	</div>
	<div class="row">
		<div class="col-sm-9">
			<div class="well component-panel">
				<h4>Articles à la une :</h4>
				@include ('layouts.articles')
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well component-panel">
				<h4>Derniers Tweets :</h4>
				<a href="https://twitter.com/{{ $twitterUser }}" class="list-group-item active" target="_blank">
					{{ '@' . $twitterUser }}
				</a>
				@foreach ($tweets as $tweet)
					<tweet date="{{ \Carbon\Carbon::parse($tweet->created_at) }} ">{!! Twitter::clickable($tweet) !!}</tweet>
				@endforeach
			</div>
		</div>
	</div>
	<div class="well component-panel">
		<h4>Projets à l'honneur</h4>
		<div class="row">
			<div class="list-group">
				@foreach ($projects as $project)
					<project-showcase project="{{ json_encode($project) }}"></project-showcase>
				@endforeach
			</div>
		</div>
	</div>
@endsection