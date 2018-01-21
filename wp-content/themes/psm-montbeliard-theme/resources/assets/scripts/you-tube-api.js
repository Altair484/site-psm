/**
 * YOU TUBE API
 *
 * @description: We use the You Tube Api to listen to the full screen mode events. Also, we want the video start playing
 * on page load but to be muted. Finally, we can easily set the url (src) parametters.
 *
 * @author: Google, used by Jeff Jardon
 */
// 1. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 2. This function creates an <iframe> (and YouTube player)
//after the API code downloads.
var player, iframe;
var $ = document.querySelector.bind(document);
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        videoId: you_video_tube_id,
        width: "100%",
        playerVars:{
            "showinfo":0,
            "rel":0,
            "controls":1,
            "autoplay":1,
            "loop":1,
            "playlist": you_video_tube_id,
            "mute":1,
            "playinline":0,
            "wmode":"opaque",
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange,
        },
    });
}

// 3. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
    iframe = $('#player');
    player.mute();

    setupListener();
}
function setupListener (){
    $('.video-background').addEventListener('dblclick', playFullscreen);
    $('.video-background').addEventListener('click', playStop);
}

function playFullscreen (){
    var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
    requestFullScreen.bind(iframe)();
}

// 4. Add events listenner for fullscreen mode
document.addEventListener("fullscreenchange", onFullScreenChange, false);
document.addEventListener("webkitfullscreenchange", onFullScreenChange, false);
document.addEventListener("mozfullscreenchange", onFullScreenChange, false);

//If the fullscreen var is empty, we mute the video, else, we reset to start and enable the sound
function onFullScreenChange() {
    var fullscreenElement = document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement;
    if(fullscreenElement == null){
        player.mute();
    }else {
        player.seekTo(0);
        player.playVideo();
        player.unMute();
    }
}

// 5. Play/Stop video
var clickCount = 0;
function playStop() {
    clickCount++;
    if(clickCount%2 == 0){
        player.playVideo()
    }else {
        player.pauseVideo()
    }
}

// 6. The API calls this function when the player's state changes.
var done = false;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        done = true;
    }
}
