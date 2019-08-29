@extends('layout')
@section('content')
	<form method="POST" action="/musics/{{$music->id}}">
		@csrf
		@method('PATCH')
		<div>
			<input type="text" name="name" placeholder="{{$music->name}}">
		</div>	
		<div>
			<input type="textarea" name="description" placeholder="{{$music->description}}">
		</div>
		<div>
			Upload your music work here:<br>
			<input type="file" name="music"><br>
		</div>
		<div>
			<input type="submit" name="update">
		</div>
	</form>
@endsection