<?


$children = [];

$mediaItems = $oo->media($item['id']);

if (count($mediaItems) > 0)
  $children []= $mediaItems[0];

$children []= $item;
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
    $out []= basename(m_root($media));
    $out []= round(filesize(m_root($media))/1000, 2) . ' KB';
  } else {
    $out []= strlen($child["body"]) . ' characters';
  }

  return $out;
}

?>

<a href="javascript:goBackOrHome()" class="no-blank"><div id="lozenge"><?= $title ?></div></a>

<!-- <div class="lang-toggle"><a href="/" class="<?= $uri[1] == "es" ? "" : "active" ?>">en</a> / <a href="/es" class="<?= $uri[1] == "es" ? "active" : "" ?>">es</a></div> -->

<div class="container">
  <div class = "column-container left"><?
for (; $idx < $length; $idx++) {
    $child = $children[$idx];
    $hasMedia = !isset($child['body']);
    $media = $hasMedia ? $child : null;
  ?>
  <div class= "child column-container-container" style="max-width: 500px;">
    <? if ($hasMedia) { echo '<img src="' . m_url($media) . '">'; } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $meta[1]  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  </div>
<?
}
?></div>
</div>

<script>
function goBackOrHome() {
  if (document.referrer == "")
    window.location.href = '/';
  else
    window.history.back();
}

</script>
