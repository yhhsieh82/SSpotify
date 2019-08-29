@extends('layout')
@section('content')
	<ul>
		@foreach( $playlists as $playlist)
			<li>
				<a href="/playlists/{{ $playlist->id }}">
					{{ $playlist->name }}
				</a>
			</li>
		@endforeach
	</ul>
@endsection