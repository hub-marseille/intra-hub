@extends('layouts.default')

@section('title', $article->name)
@section('content')
	<ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Accueil</a></li>
		<li><a href="{{ url('/articles') }}">Articles</a></li>
		<li class="active">{{ $article->name }}</li>
	</ul>
	<h3>{{ $article->name }}</h3>
	<p class="text-muted">Par <b>{{ loginFromMail($article->author->email) }}</b></p>
	<br>
	<div class="panel panel-default">
		<div class="panel-body">
			{!! $article->content !!}
		</div>
		<div class="panel-footer">
			Par <b>{{ loginFromMail($article->author->email) }}</b>,
			le <b>{{ $article->updated_at->format('d/m/Y') }}</b> à <b>{{ $article->updated_at->format('H:i') }}</b>
		</div>
	</div>
	@if (session('intraInstance'))
		<hr>
		<h5>Rédiger un commentaire :</h5>
		{!! Form::open(['method' => 'post']) !!}
		<div class="form-group">
			{!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 3, 'style' => 'resize: none']) !!}
		</div>
		<div class="form-group">
			{{ Form::submit('Valider', ['class' => 'btn btn-success']) }}
		</div>
		{!! Form::close() !!}
	@endif
	@if (count($article->comments) > 0)
		<div id="comments">
			<hr>
			<h5>Commentaires :</h5>
			@foreach ($article->comments as $comment)
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h5 class="panel-title">
							Par <b>{{ loginFromMail($article->author->email) }}</b>,
							le <b>{{ $comment->updated_at->format('d/m/Y') }}</b> à <b>{{ $comment->updated_at->format('H:i') }}</b>
							@if (session('intraInstance') and loginFromMail($article->author->email) == intra()->getLogin())
								<span class="pull-right">
									<a href="#" data-toggle="modal" data-target="#edit-comment-modal-{{ $comment->id }}">
										<span class="glyphicon glyphicon-pencil panel-glyphicon"></span>
									</a>
									<a href="#" data-toggle="modal" data-target="#remove-comment-modal-{{ $comment->id }}">
										<span class="glyphicon glyphicon-remove panel-glyphicon"></span>
									</a>
								</span>
								@include ('includes.comment_edit', ['comment_id' => $comment->id, 'comment_content' => $comment->content])
							@endif
						</h5>
					</div>
					<div class="panel-body">
						{{ $comment->content }}
					</div>
				</div>
			@endforeach
		</div>
	@endif
@endsection