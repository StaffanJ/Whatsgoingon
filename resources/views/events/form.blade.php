<div class="form-group">

	{!! Form::label('title',  'Titel:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}

	{!! Form::label('body',  'Förklarande text om eventet:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}

	{!! Form::label('published_at', 'Published On:') !!}
	{!! Form::input('date', 'published_at', $event->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}

	{!! Form::label('image', 'Bild:') !!}
	{!! Form::file('image', ['class' => 'form-control']) !!}

	{!! Form::label('age', 'Åldergräns:') !!}
	{!! Form::text('age', null, ['class' => 'form-control']) !!}

	{!! Form::label('time', 'Tiden som eventet startar:') !!}
	{!! Form::input('time','time', null,  ['class' => 'form-control']) !!}

	{!! Form::label('cost', 'Pris: ') !!}
	{!! Form::input('number', 'cost', null, ['min' => 0, 'class' => 'form-control']) !!}

	{!! Form::label('address', 'Addressen för eventet:') !!}
	{!! Form::text('address', null, ['class' => 'form-control']) !!}

	{!! Form::label('date', 'Datum:') !!}
	{!! Form::input('date', 'date', $event->date->format('Y-m-d'), ['class' => 'form-control']) !!}

	{!! Form::label('event_page', 'Evenemangets webbplats:') !!}
	{!! Form::text('event_page', null, ['class' => 'form-control']) !!}

	{!! Form::label('tag_list',  'Tags:') !!}
	{!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}

	{!! Form::submit($submitBtn, ['class' => 'btn btn-success form-control']) !!}

</div>

@section('footer')
	<script>
	  $('#tag_list').select2({
	  	placeholder: 'Choose a tag',
	  });
	</script>
@endsection