<?
// $children = [];

$mediaItems = $oo->media($item['id']);

if (count($mediaItems) > 0)
  $children []= $mediaItems[0];

$child = $item;
// $length = count($children);
// $idx = 0;

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

  $out []= $child["modified"];
  if ($media) {
    $out []= $child['name1'];
    $out []= round(filesize(m_root($media))/1000, 2) . ' KB';
  } else {
    $out []= strlen($child["body"]) . ' characters';
  }

  return $out;
}

?>

<!-- <a href="javascript:goBackOrHome()" class="no-blank"><div id="lozenge"><?= $title ?></div></a> -->
<!-- <a href="/" class="no-blank"><div id="lozenge"><?= $title ?></div></a> -->
<? require_once('views/nav.php') ?>
<!-- <div class="lang-toggle"><a href="/" class="<?= $uri[1] == "es" ? "" : "active" ?>">en</a> / <a href="/es" class="<?= $uri[1] == "es" ? "active" : "" ?>">es</a></div> -->

<div class="detail-container">
  <?
// for (; $idx < $length; $idx++) {
    // $child = $children[$idx];
  $child['body'] == "" ? $hasMedia = true : $hasMedia = false;
  $media = $hasMedia ? $mediaItems[0] : null;
  $meta = getMeta($child, $media);
    ?><div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $meta[1]  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  
<?
	if ($hasMedia) {
    if($media['type'] == 'mp4'){
      ?><video>
          <source src="<?= m_url($media); ?>" type="video/mp4">
          Your browser does not support the video element.
      </video>
      
      <?
    }
		else if ($media['type'] == 'mp3') {
			?><audio>
  				<source src="<?= m_url($media); ?>" type="audio/mpeg">
	  			Your browser does not support the audio element.
			</audio><?
		} else {
			?><img src="<?= m_url($media); ?>"><?
		}
    ?><div id = 'detail_download'><a class = 'download' href = '<?= m_url($media); ?>' download>Download</a></div><?
	}

?>
</div>

<script>
function goBackOrHome() {
  if (document.referrer == "")
    window.location.href = '/';
  else
    window.history.back();
}

</script>
<script type = "text/javascript" src='/static/js/videocontroller.js'></script>