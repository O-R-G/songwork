<?
function print_catalogue_child($oo, $cata, $children = array()){
	$length = count($children);
	?><div class="container catalogue_container cata_<? echo $cata; ?>_container"> <?
  for ($idx = 0; $idx < $length; $idx++) {
      $child = $children[$idx];
      $media = $oo->media($child["id"]);
      $child['body'] == "" ? $hasMedia = true : $hasMedia = false;
  ?>
  <div class= "child cata_<? echo $cata; ?> <?= $child['url']; ?>">
    <? if ($hasMedia) { render_media($media, $child['url']); } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <div class="catalogue_meta">
    	<div class="modified <? echo ( $cata == 'date') ? 'active' : ''  ?>"><? echo $meta[0]  ?></div>
    	<div class="filename <? echo ( $cata == 'title') ? 'active' : ''  ?>"><? echo $meta[1]  ?></div>
    	<div class="size <? echo ( $cata == 'size') ? 'active' : ''  ?>"><? echo $meta[2]  ?></div>
    </div>
  </div>
  <?
  }
  ?></div><?
}

function print_catalogue_child_detail($oo, $cata, $children = array()){
	$length = count($children);
	?><div id = '<? echo $cata; ?>_container' class="container catalogue_container catalogue_detail_container"> 
		<div id = "item_list" class = " child ">
      <div class = 'media_container'></div>
			<div class = "catalogue_meta">
				<div class="cata_num">Cat. no.</div>
		    	<div class="title">Title</div>
		    	<div class="location">Location</div>
		    	<div class="date">Date recorded</div>
		    	<div class="recordist">Sound recordist</div>
		    	<div class="duration">Duration</div>
		    	<div class="apparatus">Apparatus</div>
		    	<div class="format">Format</div>
		    	<div class="size">Size</div>
		    	<div class="modified">Date uploaded</div>
					</div>
		</div><?
  for ($idx = 0; $idx < $length; $idx++) {
      $child = $children[$idx];
      $cata_num = $child['deck'];
      $note = explode('-=-',$child['notes']);
      $title = $note[0];
      if(count($note) > 1){
      	$location = $note[1];
      	$date = $note[2];
      	$recordist = $note[3];
      	$apparatus = $note[4];
      }else{
      	$lcoation = " &mdash; ";
      	$date = " &mdash; ";
      	$recordist = " &mdash; ";
      	$apparatus = " &mdash; ";
      }
      $media = $oo->media($child["id"]);
      if($media)
      	$format = $media[0]['type'];
      else
      	$format = " - ";
      $child['body'] == "" ? $hasMedia = true : $hasMedia = false;
  ?>
  <div class= "child cata_<? echo $cata; ?> <?= $child['url']; ?>">
    <? if ($hasMedia) { render_media($media, $child['url']); } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta($child, $media); ?>
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <div class="catalogue_meta">
    	<div class="cata_num"><? echo $cata_num; ?></div>
    	<div class="title"><? echo $title;  ?></div>
    	<div class="location"><? echo $location;  ?></div>
    	<div class="date"><? echo $date;  ?></div>
    	<div class="recordist"><? echo $recordist;  ?></div>
    	<div class="duration"><? echo '11mins';  ?></div>
    	<div class="apparatus"><? echo $apparatus;  ?></div>
    	<div class="format"><? echo $format;  ?></div>
    	<div class="size <? echo ( $cata == 'size') ? 'active' : ''  ?>"><? echo $meta[2]  ?></div>
    	<div class="modified <? echo ( $cata == 'date') ? 'active' : ''  ?>"><? echo $meta[0]  ?></div>
    </div>
  </div>
  <?
  }
  ?></div><?
}

function get_recordings($oo, $img_id){
  $recordings_raw = $oo->children($img_id);
  $recordings = array();
  foreach($recordings_raw as $recording_raw){

  }

}

function children_by_order($oo, $o, $order){
	$fields = array("objects.*");
	$tables = array("objects", "wires");
	$where	= array("wires.fromid = '".$o."'",
					"wires.active = 1",
					"wires.toid = objects.id",
					"objects.active = '1'");

	return $oo->get_all($fields, $tables, $where, $order);
}

function children_by_title($oo, $o){
	$order 	= array("objects.name1","objects.date");
	return children_by_order($oo, $o, $order);
}

function children_by_date($oo, $o){
	/* 
		3/26
		Date is ordered by modified now.
	*/
	$order 	= array("objects.modified", "objects.name1", "objects.rank");
	return children_by_order($oo, $o, $order);
}
function children_by_catalogue_number($oo, $o){
	/* 
		3/26
		I put catalogue number in deck now.
	*/
	$order 	= array("objects.deck", "objects.name1","objects.date", "objects.rank");
	return children_by_order($oo, $o, $order);
}

function children_by_location($oo, $o){
	$order 	= array("objects.modified", "objects.name1");
	return children_by_order($oo, $o, $order);
}

function children_by_duration($oo, $o){
	/* 
		3/26
		Duration is ordered by end now.
	*/
	$order 	= array("objects.end", "objects.name1","objects.date", "objects.rank");
	return children_by_order($oo, $o, $order);
}

function children_by_recordist($oo, $o){
  $recordings_raw = $oo->children($o);
  $recordings = array();
  foreach($recordings_raw as $recording_raw){
    $this_detail = explode('-=-', $recording_raw['body']);
    $this_recordist = $this_detail[3];
    $this_name = $this_detail[0];
    $this_date = $this_detail[2];
    $this_key = $this_recordist.$this_name.$this_date;
    $recordings[$this_key] = $recording_raw;
  }
  ksort($recordings);

  return array_values($recordings);
}
function children_by_apparatus($oo, $o){
  $recordings_raw = $oo->children($o);
  $recordings = array();
  foreach($recordings_raw as $recording_raw){
    $this_detail = explode('-=-', $recording_raw['body']);
    $this_apparatus = $this_detail[4];
    $this_name = $this_detail[0];
    $this_date = $this_detail[2];
    $this_key = $this_apparatus.$this_name.$this_date;
    $recordings[$this_key] = $recording_raw;
  }
  ksort($recordings);

  return array_values($recordings);
} 

?> 