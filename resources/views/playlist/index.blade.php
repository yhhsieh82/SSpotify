@extends('layout')
@section('content')
	<ul>
		@foreach( $playlists as $playlist)
			<li>
				<a href="/playlists/{{ $playlist->id }}" id="{{ $playlist->id }}" >
					{{ $playlist->name }}
				</a>
			</li>
		@endforeach
	</ul>
	<form method="GET" action="/playlists/create">
		<input type="submit" class="submit" value="Create a new playlist">
	</form>
@endsection