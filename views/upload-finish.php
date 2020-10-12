<?
	chdir('/var/www/html/');
	$filename = '';
	$uploaded = file_exists('media/'.$filename.'.mp4');
	if($uploaded){
		// path to config file
		$config = $_SERVER["DOCUMENT_ROOT"];
		$config = $config."/open-records-generator/config/config.php";
		require_once($config);

		$media_id = str_replace('0', '', $filename);
		$media_sql = 'SELECT media.object FROM media WHERE media.id = "'.$media_id.'" AND media.active = "1"';
		$res = $db->query($sql);
		if(!$res)
			throw new Exception($db->error);
		$object_id = $res->fetch_assoc();
		$res->close();

		$updated_name1 = substr($filename, 1);
		$update_name1_sql = 'UPDATE objects SET objects.name1 = "'.$updated_name1.'" WHERE objects.id = "'.$object_id.'"';
		$updated = $db->query($update_name1_sql);
	}
	else
	{
		echo 'file doesnt exist';
	}
?>