<?

// set up
$imgs_id = 21;

$texts_id = 19; //en
if ($uri[1] == "es") {
  $texts_id = 20; //es
}
$children_text = $oo->children($texts_id);
$children_img = $oo->children($imgs_id);
shuffle($children_img);

$children = [];
$skip_next = false;
for ($i = 0; $i < count($children_text); $i++) {
  $children []= $children_text[$i];
  if (!$skip_next) {
    $children []= array_pop($children_img);
    if (rand(0,1) == 0)
      $skip_next = true;
  } else {
    $skip_next = false;
  }
}

$length = count($children);
$idx = 0;

// round to nearest 5
function roundUpToAny($n,$x=5) {
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

  $out []= 'Modified ' . $child["modified"];
  if ($media) {
    $out []= basename(m_root($media[0]));
    $out []= round(filesize(m_root($media[0]))/1000, 2) . ' KB';
  } else {
    $out []= strlen($child["body"]) . ' characters';
  }

  return $out;
}

?>

<a href="#top"><div id="lozenge"><?= $title ?></div></a>
<div class="lang-toggle"><a href="/" class="<?= $uri[1] == "es" ? "" : "active" ?>">en</a> / <a href="/es" class="<?= $uri[1] == "es" ? "active" : "" ?>">es</a></div>
<a name='top'></a>
<div class="container">
  <div class = "column-container left"><?
for (; $idx < $length/2; $idx++) {
    $child = $children[$idx];
    $media = $oo->media($child["id"]);
    $media ? $hasMedia = true : $hasMedia = false;
  ?>
  <div class= "child column-container-container" style="padding-left: <? echo getRandOffset($idx); ?>%; padding-right:<? echo getRandWidth($idx); ?>%;">
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <? if ($hasMedia) { echo '<img class="fullscreen" src="' . m_url($media[0]) . '">'; } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $meta[1]  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  </div>
<?
}
?></div><div class="column-container right"><?
for (; $idx < $length; $idx++) {
    $child = $children[$idx];
    $media = $oo->media($child["id"]);
    $media ? $hasMedia = true : $hasMedia = false;
  ?>
  <div class= "child column-container-container" style="padding-left: <? echo getRandOffset($idx); ?>%; padding-right:<? echo getRandWidth($idx); ?>%;">
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <? if ($hasMedia) { echo '<img class="fullscreen" src="' . m_url($media[0]) . '">'; } else  { echo '<div class="name">'. $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $meta[1]  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  </div>
<?
}
?></div>
</div>
