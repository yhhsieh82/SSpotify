<script>
	//var myObject = JSON.parse(localStorage.getItem('myObject'));

	$(document).ready(function(){
		audioElement = new Audio();

		//wait data prepared at playlist.show.blade
		if (typeof tmpSongIds !== 'undefined'){
			tmpPlaylist = JSON.parse(tmpSongIds);
			localStorage.setItem('tmpPlaylist', JSON.stringify(tmpPlaylist));
			console.log(tmpPlaylist);
		}
		
		//update the currentPlaylist
		if(currentPlaylist.length === 0){
			console.log('the currentPlaylist is undefined');
			currentPlaylist = tmpPlaylist;
			currentIndex = 0;

			localStorage.setItem('currentPlaylist', JSON.stringify(currentPlaylist));
			localStorage.setItem('currentIndex', JSON.stringify(currentIndex));
		}
		
		if(currentPlaylist.length !== 0){
			currentIndex = JSON.parse(localStorage.getItem('currentIndex'));
			console.log('the currentPlaylist is:');
			console.log(currentPlaylist);
			console.log(currentIndex);
			setPlayerInfo(currentPlaylist[currentIndex%currentPlaylist.length], currentPlaylist, false);
		}
	});

	//for the set at the new page
	function setPlayerInfo(trackId, playlist, play){
		setTrack(trackId);
		if(play){
			playSong();
		}else{
			pauseSong();
		}
	}

	//for the click on the play of the songs (show.playlist)
	function setPlayingInfo(songId){
		setTrack(songId);
    	currentPlaylist = tmpPlaylist;
    	currentIndex = currentPlaylist.indexOf(parseInt(songId));
    	playSong();

    	localStorage.setItem('currentPlaylist', JSON.stringify(currentPlaylist));
		localStorage.setItem('currentIndex', JSON.stringify(currentIndex)); 	
	}

	function setTrack(song_id) {
	   $.ajax({
            type:'POST',
            url:'/song/ajaxget',
            dataType: "json",
            data:{"song_id":song_id, _token: '{{csrf_token()}}'},
            error: function(xhr, status, error) {
			    console.log(xhr.responseText);
			},
            success:function(data){
            	var path = data.path.replace("public/", "/storage/");
		    	audioElement.setTrack(path);
		    	$(".trackName").text(data.title);
		    	setArtistName(data.artist);
		    	setAlbum(data.album);    	
            }
	    });
	}

	function setAlbum(albumId){
		$.ajax({
            type:'GET',
            url:'/album/ajaxget',
            dataType: "json",
            data:{"album_id":albumId, _token: '{{csrf_token()}}'},
            error: function(xhr, status, error) {
			    console.log(xhr.responseText);
			},
            success:function(data){
            	let path = data[0].imgPath.replace("public/", "/storage/");
		    	$(".albumArtwork").attr("src",path);
            }
	    });
	}

	function setArtistName(artistId){
		$.ajax({
            type:'GET',
            url:'/artist/ajaxget',
            dataType: "json",
            data:{"artist_id":artistId, _token: '{{csrf_token()}}'},
            error: function(xhr, status, error) {
			    console.log(xhr.responseText);
			},
            success:function(data){
		    	$(".artistName").text(data[0].name);
            }
	    });
	}

	function playNextSong(){
		pauseSong();
		var song_id = currentPlaylist[(currentIndex + 1)%currentPlaylist.length];

		setTrack(song_id);
		//$.when(setTrack()).done(playSong());
		audioElement.audio.oncanplay= function(){
			playSong();
		};

		currentIndex += 1;
		localStorage.setItem('currentIndex', JSON.stringify(currentIndex)); 
	}

	function playPrevSong(){
		var song_id = currentPlaylist[(currentIndex + currentPlaylist.length -1)%currentPlaylist.length];
		setTrack(song_id);
		playSong();

		currentIndex -= 1;
		localStorage.setItem('currentIndex', JSON.stringify(currentIndex)); 
	}

	function playSong(){
		$(".controlButton.play").hide();
		$(".controlButton.pause").show();
		audioElement.play();
	}

	function pauseSong(){
		$('.controlButton.pause').hide();
		$('.controlButton.play').show();
		audioElement.pause();
	}
</script>

<div id="nowPlayingBarContainer">	
		<div id="nowPlayingBar">
			<div id="nowPlayingLeft">	
				<div class="content">
					<span class="albumLink">
						<img src="/storage/imgAlbum/popdance.jpg" class="albumArtwork">
					</span>
					<div class="trackInfo">
						<div class="trackName">
							<span>Track Name</span>
						</div>
						<div class="artistName">
							<span>Artist</span>
						</div>
					</div>
				</div>
			</div>
			<div id="nowPlayingCenter">	
				<div class="content playerControls">
					<div class="buttons">
						<button class="controlButton shuffle" tilte="shuffle button">
							<img src="{{ asset('images/icons/shuffle.png')}}" alt="shuffle">
						</button>
						<button class="controlButton previous" tilte="previous button">
							<img src="{{ asset('images/icons/previous.png')}}" alt="previous" onclick="playPrevSong()">
						</button>
						<button class="controlButton play" tilte="play button" onclick="playSong()">
							<img src="{{ asset('images/icons/play.png')}}" alt="play">
						</button>
						<button class="controlButton pause" tilte="pause button" onclick="pauseSong()" style="display:none">
							<img src="{{ asset('images/icons/pause.png')}}" alt="pause">
						</button>
						<button class="controlButton next" tilte="next button" onclick="playNextSong()">
							<img src="{{ asset('images/icons/next.png')}}" alt="next">
						</button>
						<button class="controlButton repeat" tilte="repeat button">
							<img src="{{ asset('images/icons/repeat.png')}}" alt="repeat">
						</button>
					</div>
					<div class="playbackBar">
						<span class="progressTime current">0.00</span>
						<div class="progressBar">
							<div class="progressBarBg">
								<div class="progress"></div>
							</div>
						</div>
						<span class="progressTime remaining">0.00</span>
					</div>
				</div>
			</div>
			<div id="nowPlayingRight">	
				<div class="volumeBar">
					<button class="controlButton volume">
						<img src="{{asset('images/icons/volume.png')}}" alt="volume">
					</button>
				
					<div class="progressBar">
						<div class="progressBarBg">
							<div class="volumeprogress"></div>
						</div>
						
					</div>
				</div>
			</div>	
		</div>
	</div>