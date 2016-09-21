<div id="edit-comment-modal-{{ $comment_id }}" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Éditer votre commentaire :</h4>
			</div>
			{!! Form::open(['url' => '/comment/' . $comment_id, 'method' => 'patch']) !!}
			<div class="modal-body">
				<textarea name="comment" class="form-control" rows="6" style="resize: none;">{{ $comment_content }}</textarea>
			</div>
			<div class="modal-footer">
				{{ Form::submit('Annuler', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
				{{ Form::submit('Valider', ['class' => 'btn btn-success']) }}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

<div id="remove-comment-modal-{{ $comment_id }}" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Supprimer votre commentaire :</h4>
			</div>
			{!! Form::open(['url' => '/comment/' . $comment_id, 'method' => 'delete']) !!}
			<div class="modal-body">
				Voulez-vous vraiment supprimer votre commentaire ?
			</div>
			<div class="modal-footer">
				{{ Form::submit('Annuler', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
				{{ Form::submit('Valider', ['class' => 'btn btn-danger']) }}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>