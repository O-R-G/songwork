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
    ?><a href='/music/hushedness'>
        <video id='video' class='video fullscreen' width='100%' loop>
            <source src='<?= $url; ?>' type='video/mp4'>
            Sorry, your browser does not support video. 
        </video>
    </a><?
}
 


/* html */
       
?><div id='controls'>
    <button onclick="play_videos()" type="button">&#9654;</button>
    <button onclick="pause_videos()" type="button">| |</button>
    <button onclick="play_video(0)" type="button">PLAY ONE</button>
    <button onclick="play_video(1)" type="button">PLAY ONE</button>
    <button onclick="pause_video(0)" type="button">PAUSE ONE</button>
</div>

<a href="#top" onclick="location.reload();">
    <div id="lozenge">
        <?= $title ?>
    </div>
</a>

<a name='top'></a>
<div class="container">
  <div class = "column-container left"><?
for (; $idx < $length/2; $idx++) {
    $child = $children[$idx];
    $media = $oo->media($child["id"]);
    $child['body'] == "" ? $hasMedia = true : $hasMedia = false;
  ?>
  <div class= "child column-container-container <?= $child['url']; ?>" style="padding-left: <? echo getRandOffset($idx); ?>%; padding-right:<? echo getRandWidth($idx); ?>%;">
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <? if ($hasMedia) { render_media($media); } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $meta[1]  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  </div>
<?
}
?></div><div class="column-container right"><?
for (; $idx < $length; $idx++) {
    $child = $children[$idx];
    $media = $oo->media($child["id"]);
    $child['body'] == "" ? $hasMedia = true : $hasMedia = false;
  ?>
  <div class= "child column-container-container <?= $child['url']; ?>" style="padding-left: <? echo getRandOffset($idx); ?>%; padding-right:<? echo getRandWidth($idx); ?>%;">
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <? if ($hasMedia) { render_media($media); } else  { echo '<div class="name">'. $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $meta[1]  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  </div>
<?
}
?></div>
</div>

<script src='/static/js/videocontroller.js'></script>>
