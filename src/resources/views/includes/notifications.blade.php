@if (isset ($errors) and count($errors) > 0)
	<notification type="danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</notification>
@endif
@if (session('successNotification'))
	<notification type="success">
		{{ session('successNotification') }}
	</notification>
@endif
@if (session('dangerNotification'))
	<notification type="danger">
		{{ session('dangerNotification') }}
	</notification>
@endif
@if (session('infoNotification'))
	<notification type="info">
		{{ session('infoNotification') }}
	</notification>
@endif
@if (session('warningNotification'))
	<notification type="warning">
		{{ session('warningNotification') }}
	</notification>
@endif