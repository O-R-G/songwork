/*

    video controller

    safari and chrome mute audio on autoplay
    so this is a workaround using a button 
    to turn sounds on/off

*/

// init 

var videos = document.getElementsByClassName("video");
var index = [];
var timer;
var time_to_start = 500;
var time_to_next  = 10000;

// populate and shuffle videos[] index for play order

for (var i = 0; i < videos.length; i++) 
   index.push(i);
index = index.sort(function(a, b){return 0.5 - Math.random()});
console.log(videos.length);
console.log(index.length);
console.log(index);

// start

function start_timer() {
    timer = setTimeout(function(){ play_one_video(index[0]); }, time_to_start);
}

// video control

function play_one_video(i) {
    videos[i].style.boxShadow = '0 0px 5px 0 rgba(0,0,255,0.75), 0 0px 15px 0 rgba(0,0,255,0.19)';
    videos[i].play();
    if (i+1 < videos.length)
        timer = setTimeout(function(){ play_one_video(index[i+1]); }, time_to_next);
} 

function pause_one_video(i) { 
    videos[i].style.boxShadow = null;
    videos[i].pause();
} 

function play_all_videos() { 
    for (i = 0; i < videos.length; i++) {
        videos[i].style.boxShadow = '0 0px 5px 0 rgba(0,0,255,0.75), 0 0px 15px 0 rgba(0,0,255,0.19)';
        videos[i].play();
    }
    timer = null;
}

function pause_all_videos() { 
    for (i = 0; i < videos.length; i++) {
        videos[i].style.boxShadow = null;
        videos[i].pause();
    }
    timer = null;
}
