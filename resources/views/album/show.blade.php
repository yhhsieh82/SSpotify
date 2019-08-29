@extends('layout')
@section('content')
	<h1>{{ $album->name }}</h1>
	<img src="{{ $album->imgPath }}">
	<ul>
		@foreach($songs as $song)
			<li>
				<a href="/songs/{{$song->id}}">
					{{ $song->title }}
				</a>
				<div class="dropdown">
					<button class="dropbtn">add to playlist</button>
				  	<div class="dropdown-content">
				  		@foreach($playlists as $playlist)
				  			<form method="POST" action="/playlists/{{$playlist->id}}">
				  				{{ csrf_field() }} 
				  				<input type="hidden" name="song_id" value="{{ $song->id }}"/>  
							    <input type="submit" name="playlist_id" value="{{ $playlist->name }}" />
							</form>
				  		@endforeach
				  	</div> 
				</div>
			</li>
		@endforeach
	</ul>
@endsection