<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'musicsSharing')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style="padding-top: 40px">
	@yield('content')
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
							<img src="{{ asset('images/icons/previous.png')}}" alt="previous">
						</button>
						<button class="controlButton play" tilte="play button">
							<img src="{{ asset('images/icons/play.png')}}" alt="play">
						</button>
						<button class="controlButton pause" tilte="pause button" style="display:none">
							<img src="{{ asset('images/icons/pause.png')}}" alt="pause">
						</button>
						<button class="controlButton next" tilte="next button">
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
							<div class="progress"></div>
						</div>
						
					</div>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>