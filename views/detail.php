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

function getMeta_detail($child, $media) {
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
    $out []= $child_duration.'<br>'.round(filesize(m_root($media))/1000, 2) . ' KB';
    // audio filename
    // $out [] = str_replace(' ', '_', $child_description);
    $out [] = slug($child_description);
  } else {
    $out []= strlen($child["body"]) . ' characters';
  }

  return $out;
}


require_once('views/nav.php');

?>

<div id = 'detail_container' class="container">
  <?
  // (ctype_space($child['body']) || !$child['body']) ? $hasMedia = true : $hasMedia = false;
  $mediaItems ? $hasMedia = true : $hasMedia = false;
  $media = $hasMedia ? $mediaItems[0] : null;
  $meta = getMeta_detail($child, $media);
    ?><div class="meta"><div class="modified"><? echo $meta[0]  ?></div><div class="filename"><? echo $meta[1]  ?></div><div class="size"><? echo $meta[2]  ?></div></div>
  
<?
	if ($hasMedia) {
    if($media['type'] == 'mp4'){
      ?><video playsinline>
          <source src="<?= m_url($media); ?>" type="video/mp4" >
          Your browser does not support the video element.
      </video>
      
      <?
    }
		else if ($media['type'] == 'mp3') {
			?><audio playsinline>
  				<source src="<?= m_url($media); ?>" type="audio/mpeg">
	  			Your browser does not support the audio element.
			</audio><?
		} else {
			?><img src="<?= m_url($media); ?>"><?
		}
    ?><div id = 'detail_download'><a class = 'download' href = '/media/audio/<?= $meta[3]; ?>.wav' download>Download</a></div><?
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