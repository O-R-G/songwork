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
var vid_status_playall = false;
var vid_status_pauseall = false;
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
    // vid_status_playall = false;
    // vid_status_pauseall = false;
} 

function pause_one_video(i) { 
    videos[i].style.boxShadow = null;
    videos[i].pause();
    // vid_status_playall = false;
    // vid_status_pauseall = false;
} 

function play_all_videos() { 
    for (i = 0; i < videos.length; i++) {
        videos[i].style.boxShadow = '0 0px 5px 0 rgba(0,0,255,0.75), 0 0px 15px 0 rgba(0,0,255,0.19)';
        videos[i].play();
    }
    timer = null;
    // vid_status_playall = true;
    // vid_status_pauseall = false;
}

function pause_all_videos() { 
    // setTimeout(0) so that it executes after 
    // window click in autoplay.js;
    setTimeout(function(){
        for (i = 0; i < videos.length; i++) {
            videos[i].style.boxShadow = null;
            videos[i].pause();
        }
        timer = null;
    },0);
}

// for detail page

function play_one_video_detail() {
    console.log('play_one_video_detail');
    var video = document.querySelector('.container video');
    if(video != 'null')
        video.play();
    else
        console.log('no video on this page');
} 

function pause_one_video_detail() { 
    var video = document.querySelector('.container video');
    if(video != 'null')
        video.pause();
    else
        console.log('no video on this page');
} 