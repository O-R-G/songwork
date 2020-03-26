<?
$imgs_id = 1;
$children = $oo->children($imgs_id);
shuffle($children);
$length = count($children);
$idx = 0;

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

function render_media($media) {
    $url = m_url($media[0]);
    ?><a class = 'media_container' href='/music/hushedness'>
        <video id='video' class='video fullscreen' width='100%' loop>
            <source src='<?= $url; ?>' type='video/mp4'>
            Sorry, your browser does not support video. 
        </video>
    </a><?
}
 


/* html */
       
?>
<p id="demo"></p>
<p id="demo2" style="color:red;"></p>


<div id = "logo_ctner">
    <button id = "logo_play" onclick="play_all_videos()" type = "button">&#9654;</button>
    <a id="lozenge" href="#top" onclick="location.reload();">
        <?= $title ?>
    </a>
    <button id = "logo_pause" onclick="pause_all_videos()" type = "button">| |</button>
</div>

<? require_once('views/nav.php'); ?>

<? 
if($uri[2] == 'title'){
  $children = children_by_title($oo, $imgs_id);
  print_catelogue_child($oo, 'title', $children);
}
elseif($uri[2] == 'date'){
  $children = children_by_date($oo, $imgs_id);
  print_catelogue_child($oo, 'date', $children);
}
elseif($uri[2] == 'catalogue-number'){
  $children = children_by_catalogue_number($oo, $imgs_id);
  print_catelogue_child($oo, 'catalogue_number', $children);
}
elseif($uri[2] == 'location'){
  $children = children_by_location($oo, $imgs_id);
  print_catelogue_child_detail($oo, 'location', $children);
}
?>

<script type = "text/javascript" src='/static/js/videocontroller.js'></script>
