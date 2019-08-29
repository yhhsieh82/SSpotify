@extends('layout')
@section('content')
	<h2>You can upload your song here.</h2>
	<form method="POST" action="/musics" enctype="multipart/form-data">
		{{ csrf_field() }}               
		<div>
			Name:<br>
			<input type="text" name="name"><br>
		</div>
		<div>
			Description:<br>
			<input type="textarea" name="description"><br>
		</div>
		<div>
			Upload your music work here:<br>
			<input type="file" name="music"><br>
		</div>
		<div>
			<br>
			<input type="submit" value='submit'>
		</div>
	</form>
@endsection
