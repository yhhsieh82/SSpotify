@extends('layout')
@section('content')
	<ul>
		@foreach( $albums as $album)
			<li>
				<a href="/albums/{{ $album->id }}" id="{{ $album->id }}" >
					{{ $album->name }}
				</a>
			</li>
		@endforeach
	</ul>
@endsection