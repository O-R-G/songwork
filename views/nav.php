<? 
  $menu_chidren_raw = $oo->children(0);
  $menu_children = array();
  foreach($menu_chidren_raw as $mcr){
    if(substr($mcr['name1'], 0, 1) !== '.' && substr($mcr['name1'], 0, 1) !== '_'){
      if($mcr['url'] == 'homepage')
        $this_url = '/';
      else
        $this_url = '/'.$mcr['url'];
      $this_child = array(
        'name1' => $mcr['name1'],
        'url' => $this_url
      );
      $menu_chidren[] = $this_child;
    }
  }

  $catalogue_id = end($oo->urls_to_ids(array('catalogue')));
  $catalogue_children = $oo->children($catalogue_id);

  $searchQuery = '';
  if (isset($_GET['query']))
      $searchQuery = $_GET['query'];

?>
<div id = "nav">
  <div id = 'menu'>
    <? foreach($menu_chidren as $menu_child){ 
      $isActive = false;
      if('/'.$uri[1] == $menu_child['url']){
        $isActive = true;
      }
      elseif(!$uri[1] && $menu_child['url'] == '/')
        $isActive = true;
    ?>
      <div><a class = "nav_btn <? echo $isActive  ? 'active' : '' ?>" href = '<? echo $menu_child["url"] ?>'><? echo $menu_child["name1"] ?></a></div>
    <? } ?>
    <div id = "filter_container">
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
<? if($isDetail){ ?>
  <div id="progress_ctner">
    <progress id="progress" value="0" min="0">
       <span id="progress_bar"></span>
    </progress>
  </div>
<? }elseif($isHome){ ?>
  <div id="progress_ctner">
    <div id = 'pseudo_progress_bar'></div>
  </div>
  
<? } ?>
<div id = "logo_ctner"><button id = "logo_play" class = '<? echo ($isHome || $isDetail) ? "hovered" : ""; ?>' onclick="control_play()" type = "button">
      <svg id="" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <polygon class = 'play_svg' points="12 0 12 100 94.5 50 12 0"/>
      </svg>
      <div id = 'tooltip_ctner'>
        <div id = 'tooltip_arrow'></div>
        <div id = 'tooltip'>Click to start</div>
      </div>
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
    <a id = 'logo_cc' href = 'http://creativecommons.org/' taget = '_blank'><img src = '/media/svg/cc.svg'></a>
</div>
<!-- ================= search ==================== -->
<? if(!$isDetail){ ?>
<div id = 'searchbar_container'>
  <form id = 'search_form' method="get" action="/search" name="search-picker" id="picker">
    <input id = 'search_input' type="text" autocomplete="off" name="query" id="docket-search-input" value="<?= $searchQuery ?>">
    <input type="submit" value="Submit"/>
  </form>
  <img id='search_btn' src = '/media/svg/magnifying-glass-6-k.svg' onclick='togglesearch()'>
</div>
<? } ?>
<script type = "text/javascript" src='/static/js/menu.js'></script>
<script>
  var sLogo_play = document.getElementById('logo_play');
  logo_play.addEventListener('click', function(){
    if(logo_play.classList.contains('hovered'))
      logo_play.classList.remove('hovered');
  });

  var hasQuery = <? if ($searchQuery == '') { echo 'false'; } else { echo 'true'; } ?>;
  var searchInput = document.getElementById('search_input');
  
  if(searchInput != null){
    if (!hasQuery) {
        focusSearchInput();
    }
    function focusSearchInput() {
      var touched = false;
      // searchInput.focus();
      document.ontouchstart = function() {
        if (!touched)
          searchInput.focus();
        touched = true;
      }
      document.onclick = function() {
        if (!touched)
          searchInput.focus();
        touched = true;
      }
    }
  }
  

</script>