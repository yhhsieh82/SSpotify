@extends('layout')
@section('content')
	<ul>
		@foreach( $musics as $music)
			<li>
				<a href="/musics/{{ $music->id }}">
					{{ $music->name }}
				</a>
			</li>
		@endforeach
	</ul>
@endsection
