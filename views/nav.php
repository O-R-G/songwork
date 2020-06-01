<? 
  $menu_id = end($oo->urls_to_ids(array('menu')));
  $menu_chidren_raw = $oo->children($menu_id);
  $menu_chidren = array();
  foreach($menu_chidren_raw as $mcr){
    if(substr($mcr['name1'], 0, 1) !== '.'){
      if($mcr['url'] == 'homepage')
        $this_url = '/';
      elseif($mcr['url'] == 'submit')
        $this_url = '/submit';
      $this_child = array(
        'name1' => $mcr['name1'],
        'url' => $this_url
      );
      $menu_chidren[] = $this_child;
    }
  }

  $catalogue_id = end($oo->urls_to_ids(array('menu', 'catalogue')));
  $catalogue_children = $oo->children($catalogue_id);


?>
<div id = "nav">
  <div id = 'menu'>
    <? foreach($menu_chidren as $menu_child){ 
      $isActive = false;
      if($uri[1] == $menu_child['url'])
        $isActive = true;
      elseif(!$uri[1] && $menu_child['url'] == '/')
        $isActive = true;
    ?>
      <div><a class = "nav_btn <? echo $isActive  ? 'active' : '' ?>" href = '<? echo $menu_child["url"] ?>'><? echo $menu_child["name1"] ?></a></div>
    <? } ?>
    <div id = "catalogue-container">
      <div>ORGANIZE BY</div><div id = 'catalogues'>
        <? foreach($catalogue_children as $catalogue_child) { 
          $isActive = false;
          if($uri[2] == $catalogue_child['url'])
            $isActive = true;
        ?>
          <a class = "nav_btn <? echo $isActive ? 'active' : '' ?>" <? echo $isActive ? 'href = ""' : 'href = "/catalogue/'.$catalogue_child['url'].'"' ?> ><? echo $catalogue_child['name1'] ?></a><br>
        <? } ?>
      </div>
    </div>
  </div>
  <div id='menu_btn' onclick = 'togglemenu()'>
    <img src = '/media/svg/hamburger-6-k.svg'>
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
    <img id = 'logo_cc' src = '/media/svg/cc.svg'>
    <? if($isDetail){ ?>
    <div id="progress_ctner">
      <progress id="progress" value="0" min="0">
         <span id="progress_bar"></span>
      </progress>
   </div>
   <? } ?>
</div>
<script type = "text/javascript" src='/static/js/menu.js'></script>