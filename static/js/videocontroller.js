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
var time_to_next  = 2000;
var vid_status_playall = false;
var vid_status_pauseall = false;
var start = false;
var remaining = time_to_next;
var vids_to_be_resumed = [];
var next_index = 0;
// populate and shuffle videos[] index for play order

for (var i = 0; i < videos.length; i++) 
   index.push(i);
index = index.sort(function(a, b){return 0.5 - Math.random()});

// console.log(videos.length);
// console.log(index.length);
// console.log(index);


function control_play(){
    if(isHome)
    {
        if(!timer)
            start_timer();
        else
            resume_timer();
    }
    else if(isDetail)
    {
        play_one_video_detail();
    }
}

function control_pause(){
    if(isHome)
    {
        pause_timer();
    }
    else if(isDetail)
    {
        pause_one_video_detail();
    }
}

// start

function start_timer() {
    console.log('start_timer');
    timer = setTimeout(function(){ play_one_video(0); }, time_to_start);
}

// video control

function play_one_video(i) {
    if(!start)
        start = Date.now();
    next_index = i+1;
    videos[index[i]].style.boxShadow = '0 0px 5px 0 rgba(0,0,255,0.75), 0 0px 15px 0 rgba(0,0,255,0.19)';
    videos[index[i]].play();
    if (i+1 < videos.length){
        timer = window.setTimeout(function(){ 
            play_one_video(i+1);    
        }, time_to_next);
        
    }
    // vid_status_playall = false;
    // vid_status_pauseall = false;
} 

function pause_one_video(i) { 
    videos[i].style.boxShadow = null;
    videos[i].pause();
    // vid_status_playall = false;
    // vid_status_pauseall = false;
} 

// function play_all_videos() { 
//     for (i = 0; i < videos.length; i++) {
//         videos[i].style.boxShadow = '0 0px 5px 0 rgba(0,0,255,0.75), 0 0px 15px 0 rgba(0,0,255,0.19)';
//         videos[i].play();
//     }
//     timer = null;
//     // vid_status_playall = true;
//     // vid_status_pauseall = false;
// }
// function display_vid_status(){
//     for (i = 0; i < videos.length; i++) {
//         console.log(videos[i].paused);
//         console.log(videos[i].played);
//     }
// }
// function pause_all_videos() { 
//     // setTimeout(0) so that it executes after 
//     // window click in autoplay.js;
//     setTimeout(function(){
//         for (i = 0; i < videos.length; i++) {
//             videos[i].style.boxShadow = null;
//             videos[i].pause();

//         }
//         timer = null;
//         // window.clearTimeout(timer);
//     },0);
// }

function pause_timer() { 
    // setTimeout(0) so that it executes after 
    // window click in autoplay.js;
    vids_to_be_resumed = [];
    setTimeout(function(){
        for (i = 0; i < videos.length; i++) {
            if(!videos[i].paused)
                vids_to_be_resumed.push(i);
            videos[i].style.boxShadow = null;
            videos[i].pause();
        }
        window.clearTimeout(timer);
        remaining -= Date.now() - start;
        
    },0);
}
function resume_timer() { 
    // setTimeout(0) so that it executes after 
    // window click in autoplay.js;
    console.log('resume_timer');
    start = Date.now();
    setTimeout(function(){
        if(vids_to_be_resumed.length){
            for (j = 0; j < vids_to_be_resumed.length; j++) {
                videos[vids_to_be_resumed[j]].style.boxShadow = '0 0px 5px 0 rgba(0,0,255,0.75), 0 0px 15px 0 rgba(0,0,255,0.19)';
                videos[vids_to_be_resumed[j]].play();
            }
            window.clearTimeout(timer);
            setTimeout(function(){ play_one_video(next_index); }, remaining);
        }
    },0);
}


// for detail page

function play_one_video_detail() {
    var video = document.querySelector('.detail-container video');
    if(video != 'null')
        video.play();
    else
        console.log('no video on this page');
} 

function pause_one_video_detail() { 
    var video = document.querySelector('.detail-container video');
    if(video != 'null')
        video.pause();
    else
        console.log('no video on this page');
} 