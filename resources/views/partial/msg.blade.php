@if(session('msg'))
	<div class="alert alert-warning alert-dismissible top-space" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>{{ session('msg') }}</strong>
	</div>
@endif