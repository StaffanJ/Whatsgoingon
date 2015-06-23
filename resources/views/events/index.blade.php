@extends('app')

@foreach($events as $event)
	<h1>{{$event->title}}</h1>
	<p>{{$event->body}}</p>
	<img width="240px" src="{{$event->img}}"><br>
	@if(!Auth::user())
	@elseif(Auth::user()->id === $event->user_id)
		<a href="{{action('EventController@edit', $event->id)}}"><button class="btn btn-info btn btn-success" aria-label="Left Align">Edit: <span class="glyphicon glyphicon-cog"><span></button></a>
	@endif
@endforeach