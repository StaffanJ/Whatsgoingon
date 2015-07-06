@extends('app')
@section('content')
<h1>{{$event->title}}</h1>
<hr/>
<article>

	<p>{{$event->body}}</p>
	<p>Published {{$event->date->diffForHumans()}}</p>

		<p>City: {!! link_to_action('EventController@city', $event->city['name'], [$event->city['name']]) !!}</p>


	@unless($event->tags->isEmpty())
		<p>Tags:</p>
		<ul>
			@foreach($event->tags as $tag)
				<li>{!! link_to_action('TagsController@show', $tag->name, [$event->city['name'], $tag->name]) !!}</li>
			@endforeach
		</ul>
	@endunless

	@if(!Auth::user())
	@elseif(Auth::user()->id === $event->user_id)
		<a href="{{action('EventController@edit', $event->id)}}"><button class="btn btn-info btn btn-success" aria-label="Left Align">Edit: <span class="glyphicon glyphicon-cog"><span></button></a>
	@endif
</article>
@stop 