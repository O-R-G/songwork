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
    return roundUpToAny(rand(10, 140));
  }
}

function getRandWidth($idx) {
  return roundUpToAny(rand(10, 140));
}

function getFixedOffset($idx) {
  return 100;
}
function getFixedWidth($idx) {
  return 100;
}

function getMeta($child, $media) {
  $out = [];
  $out []= $child["modified"];
  if ($media) {
    $child_info = explode('-=-', $child['notes']);
    $child_description = $child_info[0];
    $child_location = $child_info[1];
    $child_recordist = $child_info[2];
    $child_date = $child_info[3];
    $child_duration = $child_info[4];
    $child_apparatus = $child_info[5];
    $child_license = $child_info[6];
    $out [] = $child_description . ', ' . $child_location . ', ' . $child_date . '. Recorded by ' . $child_recordist . ' on ' . $child_apparatus;
    $out []= round(filesize(m_root($media[0]))/1000, 2) . ' KB';
  } else {
    $out []= strlen($child["body"]) . ' characters';
  }

  return $out;
}

function render_media($media, $child_url, $idx) {
    $url = m_url($media[0]);
    ?><a href='/recordings/<? echo $child_url; ?>'>
        <video id='video<? echo $idx; ?>' class='video fullscreen' width='100%' poster = '/media/placeholder/ph-0.jpg' loop playsinline>
            <source src='<?= $url; ?>' type='video/mp4'>
            Sorry, your browser does not support video. 
        </video>
    </a><?
}


/* html */
       
?>

<div id = 'home_container' class="container">
<?
for ($idx = 0 ; $idx < $length; $idx++) {
    $child = $children[$idx];
    $media = $oo->media($child["id"]);
    (ctype_space($child['body']) || !$child['body']) ? $hasMedia = true : $hasMedia = false;
    $child_url = $child['url'];
    $child_info = explode('-=-', $child['notes']);
    $child_description = $child_info[0];
    $child_location = $child_info[1];
    $child_recordist = $child_info[2];
    $child_date = $child_info[3];
    $child_duration = $child_info[4];
    $child_apparatus = $child_info[5];
    $child_license = $child_info[6];
    $child_meta_filename = $child_description . ', ' . $child_location . ', ' . $child_date . '. Recorded by ' . $child_recordist . ' on ' . $child_apparatus;
  ?>
  <div class= "child column_container_container <?= $child['url']; ?>">
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <? if ($hasMedia) { render_media($media, $child_url, $idx); } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $child_meta_filename;  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  </div>
<?
}
?>
</div>

<script type = "text/javascript" src='/static/js/videocontroller.js'></script>
<script>
  var hasPlayed = false;
  var sLogo_play = document.getElementById('logo_play');
  var sTooltip_ctner = document.getElementById('tooltip_ctner');
  sLogo_play.addEventListener('mouseenter', function(){
    if(!hasPlayed)
      sTooltip_ctner.style.display = 'block';
  });
  sLogo_play.addEventListener('mouseleave', function(){
    if(!hasPlayed)
      sTooltip_ctner.style.display = 'none';
  });
  sLogo_play.addEventListener('click', function(){
    if(!hasPlayed){
      hasPlayed = true;
      sTooltip_ctner.style.display = 'none';
    }
  });
</script>

