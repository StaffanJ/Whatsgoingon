@extends('app')

@section('content')

{!! Form::model($event, ['method' => 'POST' , 'action' => ['EventController@postReport', $event->id]]) !!}

{!! Form::label('description', 'Förklarande text: ') !!}
{!! Form::textarea('description', null, ['class' => 'form-control']) !!}

{!! Form::submit('Rapportera detta event.', ['class' => 'btn btn-success form-control']) !!}

{!! Form::close() !!}

@endsection