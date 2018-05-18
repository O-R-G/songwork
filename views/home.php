<div class="header-image" style="margin-left: <? echo getRandOffset(1); ?>vw;">
  <img src="media/gif/fa-blue.gif" >
</div>
<div class="column-container">
<?
// $oo->get(0);
$children = $oo->children(0);

// usort($children, function($first,$second){
//     return $first["rank"] > $second["rank"];
// });

function roundUpToAny($n,$x=5) {
    return (round($n)%$x === 0) ? round($n) : round(($n+$x/2)/$x)*$x;
}

function getRandOffset($idx) {
  if ($idx == 0) {
    return 0;
  } else {
    // round to nearest 5
    return roundUpToAny(rand(0, 30));
  }
}

function getMeta($child, $media) {
  $out = [];

  $out []= 'Modified ' . $child["modified"];
  if ($media) {
    $out []= round(filesize(m_root($media[0]))/1000, 2) . ' KB';
  } else {
    $out []= strlen($child["body"]) . ' characters';
  }

  return $out;
}

foreach ($children as $idx=>$child) {
    $media = $oo->media($child["id"]);
    // $hasMedia = true;
    $media ? $hasMedia = true : $hasMedia = false;
  ?>
  <div class= "child column-container-container" style="margin-left: <? echo getRandOffset($idx); ?>vw">
    <? if ($hasMedia) { echo '<img src="' . m_url($media[0]) . '">'; } else  { echo $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="size"><? echo $meta[1]  ?></div></div>
  </div>
<?
}
?>
</div>
