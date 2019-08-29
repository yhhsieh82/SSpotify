@extends('layout')
@section('content')
	@if(session('message'))
	<div>
		<p>{{session('message')}}</p>
	</div>
	@endif
	<h1>{{$playlist->name}}</h1>
	<ol>
		@foreach( $songs as $song)
			<li>
				<a href="/songs/{{ $song->id }}">
					{{ $song->title }}
				</a> 
				<div class="delete">
				  	<form method="POST" action="/playlists/{{$playlist->id}}"> 
		  				@csrf
						@method('PATCH')
		  				<input type="hidden" name="playlist_song_id" value="{{ $song->id }}"/>  
					    <input type="submit" name="submit" value="delete from the playlist" />
					</form>
				</div>
			</li>
		@endforeach
	</ol>
	<form method="POST" action="/playlists/{{$playlist->id}}">
		@csrf
		@method('DELETE')
		<input type="submit" value="delete the whole playlist">
	</form>
@endsection