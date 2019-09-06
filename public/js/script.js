var audioElement ;
var mouseDown = false;
// var currentIndex;
// var tmpPlaylist = [];
// var currentPlaylist = [];

if (localStorage.getItem('tmpPlaylist') === null) {
 	var tmpPlaylist = [];
 	localStorage.setItem('tmpPlaylist', JSON.stringify(tmpPlaylist));
}
else{
	var tmpPlaylist = JSON.parse(localStorage.getItem('tmpPlaylist'))
}

if (localStorage.getItem('currentPlaylist') === null) {
 	var currentPlaylist = [];
 	localStorage.setItem('currentPlaylist', JSON.stringify(currentPlaylist));
}
else{
	var currentPlaylist = JSON.parse(localStorage.getItem('currentPlaylist'))
}

if (localStorage.getItem('currentIndex') === null) {
 	var currentIndex = 0;
 	localStorage.setItem('currentIndex', JSON.stringify(currentIndex));
}
else{
	var currentIndex = JSON.parse(localStorage.getItem('currentIndex'))
}

function formatTime(time){
	time = Math.round(time);
	var min = Math.floor(time/60);
	var sec = time - min*60;
	var extraZero = "0";
	if(sec > 9.999){
		extraZero = "";
	}

	return min + ":" + extraZero + sec;
}

function updateProgressBar(audio){
	var time = formatTime(audio.currentTime);
	$('.progressTime.current').text(time);

	var progress = audio.currentTime / audio.duration * 100;
	$(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeBar(audio){
	var progress = audio.volume * 100;
	$('.volumeBar .progressBar .progress').css('width', progress + '%');
}

function Audio(){
	//html built in <audio>
	this.audio = document.createElement('audio');

	this.audio.addEventListener('canplay', function(){
		var time = formatTime(this.duration);
		$('.progressTime.remaining').text(time);
		updateProgressBar(this);
	})

	this.audio.addEventListener('timeupdate', function(){
		updateProgressBar(this);
	})

	this.audio.addEventListener('volumechange', function(){
		updateVolumeBar(this);
	})

	this.setTrack = function(src){
		this.audio.src = src;
	}

	this.play = function(){
		this.audio.play();
	}

	this.pause = function(){
		this.audio.pause();
	}
}