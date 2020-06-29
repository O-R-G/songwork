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
  return 50;
}
function getFixedWidth($idx) {
  return 50;
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
    ?><a href='/images/<? echo $child_url; ?>'>
        <video id='video' class='video fullscreen' width='100%' loop>
            <source src='<?= $url; ?>' type='video/mp4'>
            Sorry, your browser does not support video. 
        </video>
    </a><?
}
 


/* html */
       
?>

<!-- <div id='controls'>
    <button onclick="play_all_videos()" type="button">&#9654;</button>
    <button onclick="pause_all_videos()" type="button">| |</button>
    <button onclick="start_timer()" type="button">START</button>
</div> -->


<!-- <div id = "logo_ctner">
    <button id = "logo_play" onclick="control_play()" type = "button">&#9654;</button>
    <a id="lozenge" href="#top" onclick="location.reload();">
        <?= $title ?>
    </a>
    <button id = "logo_pause" onclick="control_pause()" type = "button">| |</button>
</div>
<a id = 'top' name='top'></a> -->

<div class="container">
<?
for (; $idx < $length; $idx++) {
    $child = $children[$idx];
    $media = $oo->media($child["id"]);
    $child['body'] == "" ? $hasMedia = true : $hasMedia = false;
    $child_url = $child['url'];
    $padding_left = getFixedOffset($idx);
    $padding_right = getFixedWidth($padding_left);
  ?>
  <div class= "child column-container-container <?= $child['url']; ?>" style="padding-left: <? echo $padding_left; ?>px; padding-right:<? echo $padding_right; ?>px;">
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <? if ($hasMedia) { render_media($media, $child_url); } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $meta[1]  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  </div>
<?
}
?>
</div>

<script type = "text/javascript" src='/static/js/videocontroller.js'></script>

