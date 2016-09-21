<head>
	<title>@yield('title') • HUB Marseille</title>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@if (isset($metaTags))
		@foreach ($metaTags as $name => $content)
			<meta name="{{ $name }}" content="{{ $content }}">
		@endforeach
	@endif

<!-- CSS -->
	{{ Html::style('css/app.css') }}
</head>