<?
$toid = false;
$recordings_id = end($oo->urls_to_ids(array('recordings')));
$serial_num = count($oo->children_ids($recordings_id)) + 1;
if($serial_num>999)
	$serial_num = 'SW'.$serial_num;
elseif($serial_num>99)
	$serial_num = 'SW0'.$serial_num;
elseif($serial_num>9)
	$serial_num = 'SW00'.$serial_num;
else
	$serial_num = 'SW000'.$serial_num;
if(isset($recordings_id)){
	$vars = array("name1", "deck", "body", "notes",  "url", "begin");

	function insert_object(&$new, $siblings)
	{
		global $oo;

		// set default name if no name given
		if(!$new['name1'])
			$new['name1'] = 'untitled';

		// slug-ify url
		if($new['url'])
			$new['url'] = slug($new['url']);

		if(empty($new['url']))
			$new['url'] = slug($new['name1']);

		// make sure url doesn't clash with urls of siblings
		$s_urls = array();
		foreach($siblings as $s_id)
			$s_urls[] = $oo->get($s_id)['url'];

		// deal with dates
		if(!empty($new['begin']))
		{
			$dt = strtotime($new['begin']);
			$new['begin'] = date($oo::MYSQL_DATE_FMT, $dt);
		}

		if(!empty($new['end']))
		{
			$dt = strtotime($new['end']);
			$new['end'] = date($oo::MYSQL_DATE_FMT, $dt);
		}

		// make mysql happy with nulls and such
		foreach($new as $key => $value)
		{
			if($value)
				$new[$key] = "'".$value."'";
			else
				$new[$key] = "null";
		}

		$id = $oo->insert($new);

		// need to strip out the quotes that were added to appease sql
		$u = str_replace("'", "", $new['url']);
		$url = valid_url($u, strval($id), $s_urls);
		if($url != $u)
		{
			$new['url'] = "'".$url."'";
			$oo->update($id, $new);
		}

		return $id;
	}

	$f = array();
	$f['name1'] = addslashes($_POST['title'].', '.$_POST['location'].', '.$_POST['date'].' recorded by '.$_POST['recordist'].' on '.$_POST['apparatus']);
	$f['deck'] = $serial_num;
	$f['notes'] = addslashes($_POST['title'].'-=-'.$_POST['location'].'-=-'.$_POST['date'].'-=-'.$_POST['recordist'].'-=-'.$_POST['apparatus']);
	
	$f['begin'] = addslashes(date('Y-m-d H:i:s', time()));

	$siblings = $oo->children_ids($recordings_id);
	$toid = insert_object($f, $siblings);
	if($toid)
	{
		// wires
		$ww->create_wire($recordings_id, $toid);
		// media
		process_media_upload($toid);
		// execute bash code
		$old_path = getcwd();
		chdir('/var/www/app/songworks/_make/');
		$output = shell_exec('./__make.sh');
		chdir($old_path);
		var_dump($output);
		echo "<pre>".$output."</pre>";
	}
	

}
?>
<script>
	<? if($toid){ ?>
		//location.href = '/upload/success';
	<? }else{ ?>
		//location.href = '/upload/error';
	<? } ?>
</script>
