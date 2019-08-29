@extends('layout')
@section('content')
	<ul>
		@foreach($songs as $song)
			<li>
				<a href="/songs/{{ $song->id }}">
					{{ $song->title }}
				</a>
			</li>
		@endforeach

		@foreach($albums as $album)
			<div>
				<img src="{{ $album->imgPath }}"> 
				<a href="/albums/{{ $album->id }}">
					{{ $album->name }}
				</a>
			</div>
		@endforeach
	</ul>
@endsection