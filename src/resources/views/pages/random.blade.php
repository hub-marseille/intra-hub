@extends('layouts.default')

@section('title', 'Test')
@section('content')
	<div class="jumbotron">
		<h1>Une véritable application web</h1>
		<p>N'est-ce pas merveilleux</p>
	</div>
	<p>Façonnée avec Laravel, Bootstrap et Vue.js</p>
	<alert>mdr</alert>
	@include('includes.notifications')
	{{ Form::open(['url' => '', 'class' => 'well']) }}
	<fieldset>
		<legend>Newsletter</legend>
		<div class="form-group">
			{{ Form::label('email', 'Email', ['class' => 'col-lg-2 control-label']) }}
			<div class="col-lg-10">
				{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Mot de passe', ['class' => 'col-lg-2 control-label']) }}
			<div class="col-lg-10">
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) }}
				<div class="checkbox">
					<label>
						{{ Form::checkbox('remember') }} Se souvenir de moi
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('comment', 'Commentaire', ['class' => 'col-lg-2 control-label']) }}
			<div class="col-lg-10">
				{{ Form::textarea('comment', null, ['rows' => 3, 'class' => 'form-control', 'placeholder' => 'Commentaire']) }}
				<span class="help-block">Donnez-nous votre avis !</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Newsletter</label>
			<div class="col-lg-10">
				<div class="radio">
					<label>
						{{ Form::radio('newsletter', 'yes', true) }} Oui, je souhaite recevoir la newsletter.
					</label>
				</div>
				<div class="radio">
					<label>
						{{ Form::radio('newsletter', 'no') }} Non, cela ne m'intéresse pas.
					</label>
				</div>

			</div>
		</div>
		<div class="form-group">
			<label for="select" class="col-lg-2 control-label">Selects</label>
			<div class="col-lg-10">
				{{ Form::select('size', [1, 2, 3, 4, 5, 6, 7, 8, 9], null, ['class' => 'form-control']) }}
				<br>
				{{ Form::select('size2', [1, 2, 3, 4, 5, 6, 7, 8, 9], null, ['class' => 'form-control', 'multiple']) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2"><br>
				<button type="reset" class="btn btn-default">Annuler</button>
				<button type="submit" class="btn btn-primary">Valider</button>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}

@endsection