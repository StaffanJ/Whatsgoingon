@extends('app')

@section('content')

@foreach($cities as $city)

	<h1><a href="{{action('EventController@city', [$city->name])}}">{{$city->name}}</a></h1>

@endforeach

@endsection