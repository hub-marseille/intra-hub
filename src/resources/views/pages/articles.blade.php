@extends('layouts.default')

@section('title', 'Articles')
@section('content')
	<ul class="breadcrumb">
		<li><a href="/">Accueil</a></li>
		<li class="active">Articles</li>
	</ul>
	<h1>Articles</h1>
	@include('layouts.articles')
@endsection