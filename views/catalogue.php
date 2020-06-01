<?
$imgs_id = 1;
$children = $oo->children($imgs_id);
shuffle($children);

// defined in nav.php
$length = count($children);
$idx = 0;

$this_catalogue = '';
foreach ($catalogue_children as $catalogue_child) {
  if($catalogue_child['url'] == $uri[2])
    $this_catalogue = $catalogue_child['name1'];
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
        <video id='video' class='video fullscreen' width='100%' loop>
            <source src='<?= $url; ?>' type='video/mp4'>
            Sorry, your browser does not support video. 
        </video>
    </a><?
}
 


/* html */
       
?>
<div id = 'current_catalogue'><? echo $this_catalogue; ?></div>


<? 
if($uri[2] == 'title-a-z'){
  $children = children_by_title($oo, $imgs_id);
  print_catalogue_child($oo, 'title-a-z', $children);
}
elseif($uri[2] == 'date-recorded-new-old'){
  $children = children_by_date($oo, $imgs_id);
  print_catalogue_child($oo, 'date-recorded-new-old', $children);
}
elseif($uri[2] == 'catalogue-number-old-new'){
  $children = children_by_catalogue_number($oo, $imgs_id);
  print_catalogue_child_detail($oo, 'catalogue-number-old-new', $children);
}
elseif($uri[2] == 'location-a-z'){
  $children = children_by_location($oo, $imgs_id);
  print_catalogue_child_detail($oo, 'location-a-z', $children);
}
elseif($uri[2] == 'apparatus-a-z'){
  $children = children_by_apparatus($oo, $imgs_id);
  print_catalogue_child_detail($oo, 'apparatus-a-z', $children);
}
elseif($uri[2] == 'name-of-sound-recordist-a-z'){
  $children = children_by_recordist($oo, $imgs_id);
  print_catalogue_child($oo, 'name-of-sound-recordist-a-z', $children);
}
elseif($uri[2] == 'duration-short-long'){
  $children = children_by_duration($oo, $imgs_id);
  print_catalogue_child($oo, 'duration-short-long', $children);
}
?>

<script type = "text/javascript" src='/static/js/videocontroller.js'></script>
