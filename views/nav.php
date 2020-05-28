<? 

  // according to index.php

  if ($uri[1] == "es" || !$uri[1])
    $isHome = true;
  else if ($uri[1] =="resources")
    $isHome = true;
  else if ($uri[1] =="catalogue")
    $isCatalogue = true;
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
  <div id = "view">
    <a href = '/' class = 'nav_btn <? echo $isHome ? "active" : '' ?>'>HOMEPAGE</a> | <a  href = '<? echo $isHome ? "" : "/catalogue" ?>' class = 'nav_btn <? echo $isCatalogue ? "active" : '' ?>'>CATALOGUE VIEW</a>
  </div>
</div>
<? } ?>
<div id = "logo_ctner">
    <button id = "logo_play" onclick="play_all_videos()" type = "button">&#9654;</button>
    <a id="lozenge" href="<? echo $isHome ? '#top' : '/' ?>" onclick="location.reload();">
        <?= $title ?>
    </a>
    <button id = "logo_pause" onclick="pause_all_videos()" type = "button">| |</button>
</div>

<div id='menu_btn'>
    <button onclick = 'togglemenu'><img src = 'media/svg/hamburger-6-k'></button>
</div>
