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
    $$child_info = explode('-=-', $child['notes']);
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
function print_catalogue_children($oo, $children = array()){
  $length = count($children);
  ?><div id = "item_list" class = "">
      <div class = 'media_container'></div>
      <div class = "catalogue_meta spreadsheet_meta">
        <div class="cata_num">Cat. no.</div>
        <div class="title">Title</div>
        <div class="location">Location</div>
        <div class="date">Date recorded</div>
        <div class="recordist">Contributor</div>
        <div class="duration">Duration</div>
        <div class="apparatus">Equipment</div>
        <div class="license">License</div>
        <div class="size">Size</div>
        <div class="modified">Date uploaded</div>
        <div></div>
      </div>
    </div><?
  for ($idx = 0; $idx < $length; $idx++) {
      $child = $children[$idx];
      if(substr($child['name1'], 0, 1) != '.'){
        $cata_num = $child['deck'];
        $child_info = explode('-=-', $child['notes']);
        foreach($child_info as &$ci){
          if(!$ci)
            $ci = '&mdash;';
        }
        unset($ci);
        $title = $child_info[0];
        $location = $child_info[1];
        $recordist = $child_info[2];
        $date = $child_info[3];
        $duration = $child_info[4];
        $apparatus = $child_info[5];
        $license = $child_info[6];
        $child_meta_filename = $title . ', ' . $location . ', ' . $date . '. Recorded by ' . $recordist . ' on ' . $apparatus;
        $media = $oo->media($child["id"]);
        
        (ctype_space($child['body']) || !$child['body'] ) ? $hasMedia = true : $hasMedia = false;
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
        <div class="duration"><? echo $duration;  ?></div>
        <div class="apparatus"><? echo $apparatus;  ?></div>
        <div class="license"><? echo $license;  ?></div>
        <div class="size <? echo ( $cata == 'size') ? 'active' : ''  ?>"><? echo $meta[2]; ?></div>
        <div class="modified <? echo ( $cata == 'date') ? 'active' : ''  ?>"><? echo $meta[0]; ?></div>
        <div><? if($hasMedia){ ?><a href = '/media/audio/<?= m_pad($media[0]["id"]); ?>.wav' download class='download'>Download</a><? } ?></div>
      </div>
      <div class="catalogue_meta list_meta">
        <div class="modified <? echo ( $cata == 'date') ? 'active' : ''  ?>"><? echo $meta[0]; ?></div>
        <div class="filename <? echo ( $cata == 'title') ? 'active' : ''  ?>"><? echo $child_meta_filename;  ?></div>
        <div class="size <? echo ( $cata == 'size') ? 'active' : ''  ?>"><? echo $meta[2]; ?></div>
        <div><? if($hasMedia){ ?><a href = '/media/audio/<?= m_pad($media[0]["id"]); ?>.wav' download class='download'>Download</a><? } ?></div>
      </div>
    </div>
    <?
    }
  }
}

function get_recordings_by_cata($oo, $o, $cata){
  $recordings = $oo->children($o);
  $order = array();
  if($cata == 'catalogue-number'){
    foreach($recordings as $key => &$rr){
      $this_key = $rr['deck'];
      while(ctype_space(substr($this_key, 0, 1))){
        $this_key = substr($this_key, 1);
      }
      $rr['deck'] = $this_key;
      $order[$key] = $this_key;
    }
    unset($rr);
    array_multisort($order, SORT_ASC, $recordings);
  }
  elseif($cata == 'location')
  {
    foreach($recordings as $key => $rr){
      $this_key = explode('-=-', $rr['notes']);
      $this_key = $this_key[1];
      $order[$key] = $this_key;
    }
    array_multisort($order, SORT_ASC, $recordings);
  }
  elseif($cata == 'contributor')
  {
    foreach($recordings as $key => $rr){
      $this_key = explode('-=-', $rr['notes']);
      $this_key = $this_key[2];
      $order[$key] = $this_key;
    }
    array_multisort($order, SORT_ASC, $recordings);
  }
  elseif($cata == 'date-recorded'){
    foreach($recordings as $key => $rr){
      $this_key = explode('-=-', $rr['notes']);
      $this_key = $this_key[3];
      $order[$key] = $this_key;
    }
    array_multisort($order, SORT_ASC, $recordings);
  }
  elseif($cata == 'description'){
    foreach($recordings as $key => &$rr){
      $this_key = explode('-=-', $rr['notes']);
      $this_key = $this_key[0];
      while(ctype_space(substr($this_key, 0, 1))){
        $this_key = substr($this_key, 1);
      }
      $order[$key] = $this_key;
    }
    array_multisort($order, SORT_ASC, $recordings);
  }
  elseif($cata == 'duration'){
    foreach($recordings as $key => $rr){
      $this_key = explode('-=-', $rr['notes']);
      $this_key = $this_key[4];
      $order[$key] = $this_key;
    }
    array_multisort($order, SORT_ASC, $recordings);
  }
  elseif($cata == 'equipment'){
    foreach($recordings as $key => $rr){
      $this_key = explode('-=-', $rr['notes']);
      $this_key = $this_key[5];
      $order[$key] = $this_key;
    }
    array_multisort($order, SORT_ASC, $recordings);
  }
  elseif($cata == 'license'){
    foreach($recordings as $key => $rr){
      $this_key = explode('-=-', $rr['notes']);
      $this_key = $this_key[6];
      $order[$key] = $this_key;
    }
    array_multisort($order, SORT_ASC, $recordings);
  }
  $recordings = array_values($recordings);
  return $recordings;
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
      $m_dest = '/var/www/app/songwork-app/_make/';
      $m_dest.= $m_file;

      if(move_uploaded_file($tmp_name, $m_dest)) {
        echo 'move_uploaded_file';
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
        <div class="recordist">Contributor</div>
        <div class="duration">Duration</div>
        <div class="apparatus">Equipment</div>
        <div class="license">License</div>
        <div class="size">Size</div>
        <div class="modified">Date uploaded</div>
        <div></div>
      </div>
    </div><?
  for ($idx = 0; $idx < $length; $idx++) {
     
      $child = $children[$idx];
      if(substr($child['name1'], 0, 1) != '.'){
        $cata_num = $child['deck'];
        $child_info = explode('-=-', $child['notes']);
        foreach($child_info as &$ci){
          if(!$ci)
            $ci = '&mdash;';
        }
        unset($ci);
        $title = $child_info[0];
        $location = $child_info[1];
        $recordist = $child_info[2];
        $date = $child_info[3];
        $duration = $child_info[4];
        $apparatus = $child_info[5];
        $license = $child_info[6];
        $child_meta_filename = $title . ', ' . $location . ', ' . $date . '. Recorded by ' . $recordist . ' on ' . $apparatus;
        $media = $oo->media($child["id"]);
        
        (ctype_space($child['body']) || !$child['body'] ) ? $hasMedia = true : $hasMedia = false;
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
        <div class="duration"><? echo $duration;  ?></div>
        <div class="apparatus"><? echo $apparatus;  ?></div>
        <div class="license">License</div>
        <div class="size"><? echo $meta[2]; ?></div>
        <div class="modified"><? echo $meta[0]; ?></div>
        <div><? if($hasMedia){ ?><a href = '/media/audio/<?= m_pad($media[0]["id"]); ?>.wav' download class='download'>Download</a><? } ?></div>
      </div>
      <div class="catalogue_meta list_meta">
        <div class="modified"><? echo $meta[0]; ?></div>
        <div class="filename"><? echo $child_meta_filename; ?></div>
        <div class="size"><? echo $meta[2]; ?></div>
        <div><? if($hasMedia){ ?><a href = '/media/audio/<?= m_pad($media[0]["id"]); ?>.wav' download class='download'>Download</a><? } ?></div>
      </div>
    </div>
    <?
    }
  }
}

?> 
