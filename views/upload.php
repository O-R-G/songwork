<?
$toid = false;
$send_to = $_POST['send_to'];
$send_to_id = end($oo->urls_to_ids(array($send_to)));

if($send_to == 'recordings'){
	$redirect_url = 'submit';
}
else
{
	$serial_num = '';
	if($send_to == 'consent')
		$redirect_url = 'consent';
}

if(isset($send_to_id)){
	$vars = array("name1", "deck", "body", "notes",  "url", "begin");

	function insert_object(&$new, $siblings)
	{
		global $oo;
		global $send_to;
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
	if($send_to == 'recordings'){
		$serial_num = count($oo->children_ids($send_to_id)) + 1;
		if($serial_num>999)
			$serial_num = 'SW'.$serial_num;
		elseif($serial_num>99)
			$serial_num = 'SW0'.$serial_num;
		elseif($serial_num>9)
			$serial_num = 'SW00'.$serial_num;
		else
			$serial_num = 'SW000'.$serial_num;

		$f['name1'] = '.' . addslashes($_POST['description']);
		$f['deck'] = $serial_num;
		$recording_contributor = $_POST['forename'].' '.$_POST['surname'];
		$recording_date = $_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
		$recording_duration = $_POST['min'].':'.$_POST['sec'];
		$f['notes'] = addslashes($_POST['description'].'-=-'.$_POST['location'].'-=-'.$recording_contributor.'-=-'.$recording_date.'-=-'.$recording_duration.'-=-'.$_POST['equipment'].'-=-'.$_POST['license']);
	}
	elseif($send_to == 'consent')
	{
		$f['name1'] = addslashes($_POST['name']);
		$consent_took_place = $_POST['tp_day'].'-'.$_POST['tp_month'].'-'.$_POST['tp_year'];
		$consent_date2 = $_POST['d2_day'].'-'.$_POST['d2_month'].'-'.$_POST['d2_year'];
		$f['notes'] = addslashes($_POST['limitation'].'-=-'.$_POST['name'].'-=-'.$consent_took_place.'-=-'.$_POST['signature'].'-=-'.$_POST['address'].'-=-'.$consent_date2);
	}
	
	
	$f['begin'] = addslashes(date('Y-m-d H:i:s', time()));

	$siblings = $oo->children_ids($send_to_id);
	$toid = insert_object($f, $siblings);
	if($toid)
	{
		// wires
		$ww->create_wire($send_to_id, $toid);
		// media
		if($send_to == 'recordings'){
			$isProcessed = process_media_upload($toid);
			if(!$isProcessed)
				var_dump("audio duration");
			
		}
	}
}

if($toid && $isProcessed){ ?>
	<form id = 'audio_filename_form' action = '/<?= $redirect_url; ?>/success' method = 'POST' enctype="multipart/form-data">
		<input type = 'hidden' value = '<?= $_POST["forename"]; ?>' name = 'forename'>
		<input type = 'hidden' value = '<?= $_POST["surname"]; ?>' name = 'surname'>
		<input type = 'hidden' value = '<?= $_POST["description"]; ?>' name = 'audio_filename'>
		<input type = 'hidden' value = '<?= $isProcessed; ?>' name = 'audio_duration'>
	</form>
<? }else{ ?>
	<form id = 'audio_filename_form' action = '/<?= $redirect_url; ?>/error' method = 'POST' enctype="multipart/form-data">
	</form>
<? } ?>

<script>
	var audio_filename_form = document.getElementById('audio_filename_form');
	if(audio_filename_form != null)
		audio_filename_form.submit();
	<? if($toid){ ?>
		// location.href = '/<?= $redirect_url; ?>/success';
	<? }else{ ?>
		// location.href = '/<?= $redirect_url; ?>/error';
	<? } ?>
</script>
