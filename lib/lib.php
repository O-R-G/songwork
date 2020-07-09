<?
function render_media_cat($media, $child_url) {
    $url = m_url($media[0]);
    $placeholder_url = '/media/placeholder/'.m_pad($media[0]['id']).'.jpg';
    ?><a class = 'media_container' href='/recordings/<? echo $child_url; ?>'>
        <video id='video' class='video fullscreen' width='100%' poster = '<? echo $placeholder_url; ?>' loop playsinline>
            <source src='<?= $url; ?>' type='video/mp4'>
            Sorry, your browser does not support video. 
        </video>
    </a><?
}
function getMeta_cat($child, $media) {
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
function print_catalogue_children($oo, $cata, $children = array()){
  $length = count($children);
  if(!$cata)
    $cata = '';
  ?><div id = "item_list" class = "">
      <div class = 'media_container'></div>
      <div class = "catalogue_meta spreadsheet_meta">
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
        <div></div>
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
    <? if ($hasMedia) { render_media_cat($media, $child['url']); } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta_cat($child, $media); ?>
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <div class="catalogue_meta spreadsheet_meta">
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
      <div><? if($hasMedia){ ?><a href = '<?= m_url($media[0]); ?>' download class='download'>Download</a><? } ?></div>
    </div>
    <div class="catalogue_meta list_meta">
      <div class="modified <? echo ( $cata == 'date') ? 'active' : ''  ?>"><? echo $meta[0]  ?></div>
      <div class="filename <? echo ( $cata == 'title') ? 'active' : ''  ?>"><? echo $meta[1]  ?></div>
      <div class="size <? echo ( $cata == 'size') ? 'active' : ''  ?>"><? echo $meta[2]  ?></div>
      <div><? if($hasMedia){ ?><a href = '<?= m_url($media[0]); ?>' download class='download'>Download</a><? } ?></div>
    </div>
  </div>
  <?
  }
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
    $this_detail = explode('-=-', $recording_raw['notes']);
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
    $this_detail = explode('-=-', $recording_raw['notes']);
    $this_apparatus = $this_detail[4];
    $this_name = $this_detail[0];
    $this_date = $this_detail[2];
    $this_key = $this_apparatus.$this_name.$this_date;
    $recordings[$this_key] = $recording_raw;
  }
  ksort($recordings);
  
  return array_values($recordings);
} 
function process_media_upload($toid)
{
  global $mm;
  global $rr;
  global $resize;
  global $resize_root;
  global $resize_scale;
  global $media_root;

  $m_rows = $mm->num_rows();
  $m_old = $m_rows;
  foreach($_FILES["uploads"]["error"] as $key => $error)
  {
    if($error == UPLOAD_ERR_OK)
    {
      $tmp_name = $_FILES["uploads"]["tmp_name"][$key];
      $m_name = $_FILES["uploads"]["name"][$key];
      $m_type = strtolower(end(explode(".", $m_name)));

      // add to db's image list
      $m_arr["type"] = "'".$m_type."'";
      $m_arr["object"] = "'".$toid."'";
      if(isset($rr->medias))
        $m_arr["caption"] = "'".$rr->captions[$key+count($rr->medias)]."'";
      else
        $m_arr["caption"] = "null";
      $insert_id = $mm->insert($m_arr);
      $m_rows++;

      $m_file = m_pad($insert_id).".".$m_type;
      // $m_dest = $resize ? $resize_root : $media_root;
      $m_dest = '/home/reinfurt/sketchbook/songworks/_make/';
      $m_dest.= $m_file;

      if(move_uploaded_file($tmp_name, $m_dest)) {
        if($resize)
          resize($m_dest, $media_root.$m_file, $resize_scale);
      }
      else {
        $m_rows--;
        $mm->deactivate($insert_id);
      }
      $mm->update($insert_id, array('type'=>"'mp4'"));
    }
  }
  return $m_old < $m_rows;
}

function build_children_search($oo, $ww, $query) {
  $children_combined = array();
  $recordings_id = end($oo->urls_to_ids(array('recordings')));
  $query = preg_replace('/[^a-z0-9]+/i', ' ', $query);
  $query = addslashes($query);
  $query = strtolower($query);
  $query = str_replace(' ', '%', $query);

  // search
  $fields = array("objects.*");
  $tables = array("objects", "wires");
  $where  = array("objects.active = '1'",
                  "(LOWER(CONVERT(BINARY objects.name1 USING utf8mb4)) LIKE '%" . $query .
                  "%' OR LOWER(CONVERT(BINARY objects.deck USING utf8mb4)) LIKE '%" . $query . "%')",
                  "wires.toid = objects.id",
                  "wires.fromid = '".$recordings_id."'",
                  "wires.active = '1'");
  $order  = array("objects.name1", "objects.begin", "objects.end");
  // $order  = array("objects.end");
  $children = $oo->get_all($fields, $tables, $where, $order);

  // preprocess to remove any thing we dont want to show

  // sort by ranking and then end date
  // usort($children_combined, function($a, $b) {
  //   if ($a['root']['ranking'] != $b['root']['ranking']) {
  //     return $a['root']['ranking'] <=> $a['root']['ranking'];
  //   } else {
  //     return $b['end'] <=> $a['end'];
  //   }
  // });

  return $children;
}

function print_search_children($oo, $children = array()){
  $length = count($children);
  ?><div id = "item_list" class = "">
      <div class = 'media_container'></div>
      <div class = "catalogue_meta spreadsheet_meta">
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
        <div></div>
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
    <? if ($hasMedia) { render_media_cat($media, $child['url']); } else  { echo '<div class="name">' . $child['name1'] . '</div>' . $child["body"]; } ?>
    <? $meta = getMeta_cat($child, $media); ?>
    <a class="anchor" name="<?= $child['url']; ?>"></a>
    <div class="catalogue_meta spreadsheet_meta">
      <div class="cata_num"><? echo $cata_num; ?></div>
      <div class="title"><? echo $title;  ?></div>
      <div class="location"><? echo $location;  ?></div>
      <div class="date"><? echo $date;  ?></div>
      <div class="recordist"><? echo $recordist;  ?></div>
      <div class="duration"><? echo '11mins';  ?></div>
      <div class="apparatus"><? echo $apparatus;  ?></div>
      <div class="format"><? echo $format;  ?></div>
      <div class="size"><? echo $meta[2]  ?></div>
      <div class="modified"><? echo $meta[0]  ?></div>
      <div><? if($hasMedia){ ?><a href = '<?= m_url($media[0]); ?>' download class='download'>Download</a><? } ?></div>
    </div>
    <div class="catalogue_meta list_meta">
      <div class="modified"><? echo $meta[0]  ?></div>
      <div class="filename"><? echo $meta[1]  ?></div>
      <div class="size"><? echo $meta[2]  ?></div>
      <div><? if($hasMedia){ ?><a href = '<?= m_url($media[0]); ?>' download class='download'>Download</a><? } ?></div>
    </div>
  </div>
  <?
  }
}

?> 