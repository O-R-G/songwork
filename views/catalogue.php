<?
$recordings_id = 1;
// $children = $oo->children($imgs_id);
// shuffle($children);

// defined in nav.php
// $length = count($children);
$idx = 0;

$this_catalogue = '';
foreach ($catalogue_children as $catalogue_child) {
  if($catalogue_child['url'] == $uri[2]){
    $this_range = $catalogue_child['deck'];
    while(ctype_space(substr($this_range, 0, 1)))
      $this_range = substr($this_range, 1);
    $this_catalogue = $catalogue_child['name1'];
    if(strpos($this_range, '/') !== false){
      $this_from = explode('/', $this_range)[0];
      $this_to = explode('/', $this_range)[1];
      $order = $this_range;
      $order_reverse = $this_to . '/' . $this_from;
    }
    else{
      $this_from = explode('&mdash;', htmlentities($this_range))[0];
      $this_to = explode('&mdash;', htmlentities($this_range))[1];
      $order = $this_range;
      $order_reverse = $this_to . '&mdash;' . $this_from;
    }
    
    
  }
}

function roundUpToAny($n,$x=5) {
    // round to nearest 5
    return (round($n)%$x === 0) ? round($n) : round(($n+$x/2)/$x)*$x;
}

function getRandOffset($idx) {
  if ($idx == 0) {
    return 0;
  } else {
    return roundUpToAny(rand(10, 35));
  }
}

function getRandWidth($idx) {
  return roundUpToAny(rand(10, 35));
}

/* html */
       
?>
<div id = 'catalogue_control'>
  <div id = 'view_toggle'>
    <label class = 'radio_container'>Spreadsheet
      <input type = 'radio' name = 'catalogue_control' checked value = 'spreadsheet'><span class="checkmark"></span>
    </label>
    <label class = 'radio_container'>List
      <input type = 'radio' name = 'catalogue_control' value = 'list'><span class="checkmark"></span>
    </label>
  </div>
  <div id = 'filter'>
    <div>ORGANISE BY</div><div id = 'current_catalogue'><? echo $this_catalogue; ?> <span id = 'order'>(<?= $order; ?>)</span><span id = 'order_reverse' class = 'order_reverse'>(<?= $order_reverse; ?>)</span><div id = 'order_toggle'>↑</div><br>
    <? foreach($catalogue_children as $catalogue_child) { 
          $isActive = false;
          $this_range = $catalogue_child['deck'];
          while(ctype_space(substr($this_range, 0, 1)))
            $this_range = substr($this_range, 1);
          $cata_name = $catalogue_child['name1'].' ('.$this_range.')';
          if($uri[2] !== $catalogue_child['url']){
        ?>
          <a class = "nav_btn <? echo $isActive ? 'active' : '' ?>" <? echo $isActive ? 'href = ""' : 'href = "/catalogue/'.$catalogue_child['url'].'"' ?> ><? echo $cata_name; ?></a><br>
        <? }} ?>
      </div>
  </div>
</div>


<div id = 'catalogue_container' class="container " view = 'spreadsheet'> 
<? 

$this_cata = $uri[2];
$children = get_recordings_by_cata($oo, $recordings_id, $this_cata);
print_catalogue_children($oo, $children);
?>
</div>
<script type = "text/javascript" src='/static/js/videocontroller.js'></script>
<script>
  var sRadio_btn = document.querySelectorAll('.radio_container > input');
  var sCatalogue_container = document.getElementById('catalogue_container');
  Array.prototype.forEach.call(sRadio_btn, function(el, i){
    el.addEventListener('click', function(){
      sCatalogue_container.setAttribute('view', el.value);
    });
  });

  var sOrder_toggle = document.getElementById('order_toggle');
  var sOrder = document.getElementById('order');
  var sOrder_reverse = document.getElementById('order_reverse');
  var sCurrent_catalogue = document.getElementById('current_catalogue');
  var isClicked = false;
  sOrder_toggle.addEventListener('mouseenter', function(){
    sCurrent_catalogue.classList.toggle('viewing_reverse');
    sOrder_reverse.style.color = '#00f';
    sOrder.style.color = '#00f';
  });
  sOrder_toggle.addEventListener('mouseleave', function(){
    if(!isClicked){
      sCurrent_catalogue.classList.toggle('viewing_reverse');
      sOrder_toggle.innerText = '↑';
    }
    else
    {
      isClicked = false;
    }
    sOrder_reverse.style.color = '#000';
    sOrder.style.color = '#000';
    
  });

  sOrder_toggle.addEventListener('click', function(){
    isClicked = true;
    sOrder_reverse.style.color = '#000';
    sOrder.style.color = '#000';
    reverse_child();
  });

  function reverse_child(){
    var child = document.getElementsByClassName('child');
    Array.prototype.forEach.call(child, function(el, i){
      sCatalogue_container.appendChild(child[child.length - i - 1]);
    });
  }

  if(isMobile){
    var sSpreadsheet_meta = document.getElementsByClassName('spreadsheet_meta');
    var meta_tag = [];
    Array.prototype.forEach.call(sSpreadsheet_meta, function(el, i){
      if(i == 0){
        var meta_tag_element = el.querySelectorAll('div');
        for(j = 0; j < meta_tag_element.length; j++){
          meta_tag.push(meta_tag_element[j].innerText);
        }
      }else{
        var this_meta_element = el.querySelectorAll('div');

        for(j = 0; j < this_meta_element.length - 1; j++){
          var temp = this_meta_element[j].innerText;
          var this_meta_tag = document.createElement('span');
          var this_meta = document.createElement('span');
          this_meta_tag.innerText = meta_tag[j];
          this_meta_tag.className = 'meta_tag';
          this_meta.innerText = temp;
          this_meta_element[j].innerHTML = '';
          this_meta_element[j].appendChild(this_meta_tag);
          this_meta_element[j].appendChild(this_meta);
        }
      }
    });
  }
</script> 
