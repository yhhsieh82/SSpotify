@extends('layout')
@section('content')
	<form method="POST" action="/playlists" >
		{{ csrf_field() }}
		<input type="text" name="name" placeholder="your playlist name here"><br>
		<input type="submit" value="Submit">
	</form>
@endsection