@if (Session::has('flash_notification.message'))

<div class="alert alert-success" {{ Session::has('flash_message_important') ? 'alert-important' : '' }}>		
	@if (Session::has('flash_notification.overlay'))
		
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	
	@endif	

	{{ session('flash_message') }}
</div>
@endif