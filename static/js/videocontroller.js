/*

    video controller

    safari and chrome mute audio on autoplay
    so this is a workaround using a button 
    to turn sounds on/off

*/

// perhaps have these fade in one at a time
// in a random order using setinterval()?

var videos = document.getElementsByClassName("video");
var next;

function play_videos() { 
    for (i = 0; i < videos.length; i++) {
        videos[i].play();
        // start one video at a time
        // wrap arg in anonymous function
        // of course this is not working
        // next = setTimeout(function(){ play_video(i);}, 1000);
    }
} 

function pause_videos() { 
    for (i = 0; i < videos.length; i++) {
        videos[i].pause();
    }
}

function play_video(i) { 
    videos[i].play();
} 

function pause_video(i) { 
    videos[i].pause();
} 

