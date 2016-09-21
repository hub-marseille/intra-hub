<template>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<b>{{ article.name }}</b> - par {{ article.author_id }}
			<span class="pull-right">{{ article.created_at }}</span>
		</div>
		<div class="panel-body">
			text_beginning($article->content, 350)<br>
			<a href="/articles/article->id/url_friendly($article->name)">Lire plus...</a>
		</div>
	</div>
</template>
<script>
	export default
	{
		props: ['article'],

		created()
		{
			this.article = JSON.parse(this.article);
		}
	}
</script>