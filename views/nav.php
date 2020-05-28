<? 
  
?>
<div id = "nav">
  <div>
    <div><a class = "nav_btn <? echo $isHome ? 'active' : '' ?>" href = '/'>HOMEPAGE</a></div>
    <div><a class = "nav_btn <? echo $isSubmit ? 'active' : '' ?>" href = '/submit'>SUBMIT</a></div>
    <div>ORGANIZE BY</div>
  </div>
  <div id = "order">
    
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

<div id = "logo_ctner">
    <button id = "logo_play" onclick="control_play()" type = "button">
      <svg id="" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <polygon class = 'play_svg' points="12 0 12 100 94.5 50 12 0"/>
      </svg>
    </button>
    <a id="lozenge" href="<? echo $isHome ? '#top' : '/' ?>" onclick="location.reload();">
        <?= $title ?>
    </a>
    <button id = "logo_pause" onclick="control_pause()" type = "button">
      <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <rect class = 'pause_svg' x="13" y="1" width="25" height="98"/>
        <rect class = 'pause_svg' x="62" y="1" width="25" height="98"/>
      </svg>
    </button>
</div>

<div id='menu_btn' onclick = 'togglemenu()'>
  <img src = '/media/svg/hamburger-6-k.svg'>
</div>
<script type = "text/javascript" src='/static/js/menu.js'></script>