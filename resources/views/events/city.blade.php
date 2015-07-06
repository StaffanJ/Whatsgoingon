@extends('app')

@section('content')
@foreach($events as $event)

	<h1><a href="{{action('EventController@show', [$event->city['name'], $event->id])}}">{{$event->title}}</a></h1>

	<div class="body">{{str_limit($event->body, $limit = 10, $end = '...')}}</div>

	<p class="body">{{$event->date->diffForHumans()}}</p>
@endforeach

@endsection