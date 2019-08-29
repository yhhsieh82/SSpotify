@extends('layout')
@section('content')
	<div>
		<h2>{{$music->name}}</h2>
		<p>{{$music->description}}</p>
	</div>

	<div>
		<audio controls="controls">
			<source src="{{ $url }}" type="audio/mpeg">
			Your browser does not support the audio element. 
		</audio>
	</div>

	@if($music->owner_id == auth()->id())
		<p>
			<a href="/musics/{{$music->id}}/edit">Edit</a>
		</p>
	@endif

@endsection