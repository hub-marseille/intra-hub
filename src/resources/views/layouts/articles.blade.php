@if (!$articles->isEmpty())
	@foreach($articles as $article)
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b>{{ $article->name }}</b> | par <b>{{ $article->author->login }}</b>
				<span class="pull-right">
				le <b>{{ $article->created_at->format('d/m/Y') }}</b> à <b>{{ $article->created_at->format('H:i') }}</b>
			</span>
			</div>
			<div class="panel-body">
				{!! text_beginning($article->content, 350) !!}<br>
				<a href="/articles/{{ $article->id }}/{{ url_friendly($article->name) }}">Lire plus...</a>
				<span class="pull-right text-muted">
					{{ count($article->comments) }} commentaire{{ (count($article->comments) > 1) ? ('s') : ('') }}
				</span>
			</div>
		</div>
	@endforeach
@else
	<alert type="info">Aucun article n'a encore été écrit</alert>
@endif

@if (!isset($shortArticles))
	{{ $articles->links() }}
@endif