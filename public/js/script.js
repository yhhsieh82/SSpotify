function Audio(){
	//html built in <audio>
	this.audio = document.createElement('audio');
	this.currentPlaying;

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