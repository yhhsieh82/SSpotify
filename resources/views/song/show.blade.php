@extends('layout')
@section('content')
	<div>
		<h2>{{$song->title}}</h2>
		
	</div>

	<div>
		<audio controls="controls">
			<source src="{{ $url }}" type="audio/mpeg">
			Your browser does not support the audio element. 
		</audio>
	</div>

@endsection