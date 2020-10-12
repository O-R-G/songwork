<?
	chdir('/var/www/html/');
	$all_media_filenames = scandir('media/');
	$oldname = false;
	foreach($all_media_filenames as $name){
		if(substr($name, 0, 2) == '--')
			$oldname = $name;
	}
	if($oldname){
		$newname = substr($oldname, 2);
		rename('media/'.$oldname, 'media/'.$newname);
		$path_parts = pathinfo('media/'.$newname);
		$filename = $path_parts['filename'];

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
		echo 'file doesnt exist\n';
	}
?>