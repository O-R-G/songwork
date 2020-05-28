<? 
  
?>
<? if ( $isCatalogue || $isHome ){ ?>

<div id = "nav">
  
  <div id = "order">
    ORGANIZE BY
    <br>
    <br>
    <a class = "nav_btn <? echo ($uri[2] == 'catalogue-number') ? 'active' : '' ?>" <? echo ($uri[2] == 'catalogue-number') ? '' : 'href = "/catalogue/catalogue-number"' ?> >Catalogue number (old–new)</a>
    <br>
    <a class = "nav_btn <? echo ($uri[2] == 'title') ? 'active' : '' ?>" <? echo ($uri[2] == 'title') ? '' : 'href = "/catalogue/title"' ?> >Title (A–Z)</a>
    <br>
    <a class = "nav_btn <? echo ($uri[2] == 'location') ? 'active' : '' ?>" <? echo ($uri[2] == 'location') ? '' : 'href = "/catalogue/location"' ?> >Location (A–Z)</a>
    <br>
    <a class = "nav_btn <? echo ($uri[2] == 'date') ? 'active' : '' ?>" <? echo ($uri[2] == 'date') ? '' : 'href = "/catalogue/date"' ?> >Date recorded (new–old)</a>
    <br>
    <a class = "nav_btn <? echo ($uri[2] == 'recordist') ? 'active' : '' ?>" <? echo ($uri[2] == 'recordist') ? '' : 'href = "/catalogue/recordist"' ?> >Name of sound recordist (A–Z)</a>
    <br>
    <a class = "nav_btn <? echo ($uri[2] == 'duration') ? 'active' : '' ?>" <? echo ($uri[2] == 'duration') ? '' : 'href = "/catalogue/duration"' ?> >Duration (short–long)</a>
    <br>
    <a class = "nav_btn <? echo ($uri[2] == 'apparatus') ? 'active' : '' ?>" <? echo ($uri[2] == 'apparatus') ? '' : 'href = "/catalogue/apparatus"' ?> >Apparatus (A–Z)</a>
    <br>
  </div>
</div>
<? } ?>
<div id = "logo_ctner">
    <button id = "logo_play" onclick="<? echo $isHome ? 'start_timer()' : 'play_one_video_detail()' ?>" type = "button">
      <svg id="" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <polygon class = 'play_svg' points="12 0 12 100 94.5 50 12 0"/>
      </svg>
    </button>
    <a id="lozenge" href="<? echo $isHome ? '#top' : '/' ?>" onclick="location.reload();">
        <?= $title ?>
    </a>
    <button id = "logo_pause" onclick="<? echo $isHome ? 'pause_all_videos()' : 'pause_one_video_detail()' ?>" type = "button">
      <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <rect class = 'pause_svg' x="13" y="1" width="25" height="98"/>
        <rect class = 'pause_svg' x="62" y="1" width="25" height="98"/>
      </svg>
    </button>
</div>

<div id='menu_btn'>
    <button onclick = 'togglemenu()'>
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 150 150" style="enable-background:new 0 0 150 150;" xml:space="preserve">
        <style type="text/css">
          .st0{fill:none;stroke:#000000;stroke-width:6;stroke-miterlimit:10;}
        </style>
        <line class="st0" x1="43.8" y1="54.2" x2="106.2" y2="54.2"/>
        <line class="st0" x1="43.8" y1="75.3" x2="106.2" y2="75.3"/>
        <line class="st0" x1="43.8" y1="96.5" x2="106.2" y2="96.5"/>
      </svg>
    </button>
</div>
<script type = "text/javascript" src='/static/js/menu.js'></script>