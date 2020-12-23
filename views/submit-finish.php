<?
	$site_path = '/var/www/html/';
	// $site_path = '/Library/WebServer/Documents/songwork.local/';
	chdir($site_path);
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
		$config = $site_path . "lib/config-cli.php";
		require_once($config);
		$oo = new Objects();
		$db = db_connect('main');

		$media_id = intval($filename);
		echo "media_id = ";
		var_dump($media_id);
		$media_sql = 'SELECT objects.id FROM media, objects WHERE media.id = "'.$media_id.'" AND media.object = objects.id AND media.active = "1" AND objects.active = "1"';
		$res = $db->query($media_sql);
		if(!$res)
			throw new Exception($db->error);
		$object_id = $res->fetch_assoc()['id'];
		$res->close();
		var_dump($object_id);
		$old_name1 = $oo->name($object_id);
		if(substr($old_name1, 0, 1) == '.')
			$updated_name1 = substr($old_name1, 1);
		else
			return false;
		$audiofilename = slug($updated_name1);
		rename('media/audio/'.$filename.".wav", 'media/audio/'.$audiofilename.".wav");
		// echo 'name = \n';
		// echo $updated_name1;
		// $update_name1_sql = 'UPDATE objects SET objects.name1 = "'.$updated_name1.'" WHERE objects.id = "'.$object_id.'"';
		// $updated = $db->query($update_name1_sql);
		
		// var_dump($updated);
	}
	else
	{
		echo 'cant find any filename beginning with "--"';
	}
?>