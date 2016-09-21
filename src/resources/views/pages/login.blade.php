@extends('layouts.default')

@section('title', 'Connexion')
@section('content')
	{{ Form::open(['url' => '/login', 'method' => 'post', 'class' => 'form-horizontal well']) }}
	<fieldset>
		<legend>Connexion</legend>
		<div class="form-group">
			{{ Form::label('login', 'Login', ['class' => 'col-lg-2 control-label']) }}
			<div class="col-lg-10">
				{{ Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Login']) }}
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
			<div class="col-lg-10 col-lg-offset-2"><br>
				<button type="submit" class="btn btn-primary btn-lg btn-block">
					Valider
					<span class="glyphicon glyphicon-log-in"></span>
				</button>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
@endsection