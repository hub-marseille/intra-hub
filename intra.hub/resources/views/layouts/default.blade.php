<!doctype html>
<html lang="fr">
@include('layouts.head')
<body>
	@include('layouts.navbar')
	<div class="container">
		@include('includes.notifications')
		@yield('content')
		@include('includes.top_crawler')
	</div>
	@include('layouts.footer')
	{{ Html::script('js/app.js') }}
</body>
</html>