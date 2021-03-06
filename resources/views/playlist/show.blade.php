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
	<ul>
		@foreach( $songs as $song)
			<li>
				<button class="getSongPlayed" value="{{ $song->id }}" onclick="setPlayingInfo('{{ $song->id }}')">{{ $song->id }}</button>
				<a href="/songs/{{ $song->id }}">
					{{ $song->title }}
				</a> 
				<div style="display: inline">
				  	<form  style="display: inline"method="POST" action="/playlists/{{$playlist->id}}"> 
		  				@csrf
						@method('PATCH')
		  				<input type="hidden" name="song_id" value="{{ $song->id }}"/>  
					    <input type="submit" class="submit" name="submit" value="delete" />
					</form>
				</div>
			</li>
		@endforeach
	</ul>
	<form method="POST" action="/playlists/{{$playlist->id}}">
		@csrf
		@method('DELETE')
		<input type="submit" class="submit" value="delete the whole playlist">
	</form>
@endsection