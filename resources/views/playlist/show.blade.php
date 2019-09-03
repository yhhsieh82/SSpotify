@extends('layout')


@section('content')

<?php 
	$songIdArray = array();
	foreach( $songs as $song){
		array_push($songIdArray, $song->id);
	}
?>
<script>
	var tmpSongIds = "<?php echo json_encode($songIdArray); ?>";
</script>


	@if(session('message'))
	<div>
		<p>{{session('message')}}</p>
	</div>
	@endif
	<h1>{{$playlist->name}}</h1>
	<ol>
		@foreach( $songs as $song)
			<li>
				<button class="getSongPlayed" value="{{ $song->id }}" onclick="setPlayingInfo('{{ $song->id }}')">{{ $song->id }}</button>
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