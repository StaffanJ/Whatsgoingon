@if($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">{{$error}}</span></p>
		@endforeach
	</ul>
@endif