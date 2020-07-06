<?
$imgs_id = 1;
$children = $oo->children($imgs_id);
shuffle($children);

// defined in nav.php
$length = count($children);
$idx = 0;

$this_catalogue = '';
foreach ($catalogue_children as $catalogue_child) {
  if($catalogue_child['url'] == $uri[2]){
    $this_catalogue = $catalogue_child['name1'];
    $this_order = explode('(',$this_catalogue)[1];
    $this_from = explode('–',$this_order)[0];
    $this_to = str_replace(')', '', explode('–',$this_order)[1]);
    $this_catalogue = explode('(',$this_catalogue)[0];
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

function getMeta($child, $media) {
  $out = [];
  $out []= $child["modified"];
  if ($media) {
    // $out []= basename(m_root($media[0]));
    $out []= $child['name1'];
    $out []= round(filesize(m_root($media[0]))/1000, 2) . ' KB';
  } else {
    $out []= strlen($child["body"]) . ' characters';
  }

  return $out;
}

function render_media($media, $child_url) {
    $url = m_url($media[0]);
    ?><a class = 'media_container' href='/images/<? echo $child_url; ?>'>
        <video id='video' class='video fullscreen' width='100%' poster = '/media/placeholder/ph-0.jpg' loop playsinline>
            <source src='<?= $url; ?>' type='video/mp4'>
            Sorry, your browser does not support video. 
        </video>
    </a><?
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
    <div>ORGANIZE BY</div><div id = 'current_catalogue'><? echo $this_catalogue; ?><span id = 'order'>(<? echo $this_from.'—'.$this_to ?>)</span><span id = 'order_reverse' class = 'order_reverse'>(<? echo $this_to.'—'.$this_from ?>)</span><div id = 'order_toggle'>&#8643;&#8638;</div><br>
    <? foreach($catalogue_children as $catalogue_child) { 
          $isActive = false;
          if($uri[2] !== $catalogue_child['url']){
        ?>
          <a class = "nav_btn <? echo $isActive ? 'active' : '' ?>" <? echo $isActive ? 'href = ""' : 'href = "/catalogue/'.$catalogue_child['url'].'"' ?> ><? echo $catalogue_child['name1'] ?></a><br>
        <? }} ?>
      </div>
  </div>
</div>


<div id = 'catalogue_container' class="container " view = 'spreadsheet'> 
<? 
if($uri[2] == 'title-a-z'){
  $children = children_by_title($oo, $imgs_id);
  print_catalogue_children($oo, 'title-a-z', $children);
}
elseif($uri[2] == 'date-recorded-new-old'){
  $children = children_by_date($oo, $imgs_id);
  print_catalogue_children($oo, 'date-recorded-new-old', $children);
}
elseif($uri[2] == 'catalogue-number-old-new'){
  $children = children_by_catalogue_number($oo, $imgs_id);
  print_catalogue_children($oo, 'catalogue-number-old-new', $children);
}
elseif($uri[2] == 'location-a-z'){
  $children = children_by_location($oo, $imgs_id);
  print_catalogue_children($oo, 'location-a-z', $children);
}
elseif($uri[2] == 'apparatus-a-z'){
  $children = children_by_apparatus($oo, $imgs_id);
  print_catalogue_children($oo, 'apparatus-a-z', $children);
}
elseif($uri[2] == 'name-of-sound-recordist-a-z'){
  $children = children_by_recordist($oo, $imgs_id);
  print_catalogue_children($oo, 'name-of-sound-recordist-a-z', $children);
}
elseif($uri[2] == 'duration-short-long'){
  $children = children_by_duration($oo, $imgs_id);
  print_catalogue_children($oo, 'duration-short-long', $children);
}
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
  sOrder_toggle.addEventListener('mouseenter', function(){
    sCurrent_catalogue.classList.add('viewing_reverse');
    sOrder_reverse.style.color = '#00f';
    sOrder.style.color = '#00f';
  });
  sOrder_toggle.addEventListener('mouseleave', function(){
    sCurrent_catalogue.classList.remove('viewing_reverse');
    sOrder_reverse.style.color = '#000';
    sOrder.style.color = '#000';
  });

  sOrder_toggle.addEventListener('click', function(){
    sCurrent_catalogue.classList.remove('viewing_reverse');
    sOrder.classList.toggle('order_reverse');
    sOrder_reverse.classList.toggle('order_reverse');

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
