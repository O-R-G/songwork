<?

	$column_left = $item['deck'];
	if($uri[2] == 'success'){
		$audio_filename = $_POST['audio_filename'];
		$old_path = getcwd();
		chdir('/var/www/app/songwork-app/_make/');
		$output = shell_exec("./__make.sh ".$audio_filename." 1>>debug.log 2>&1 &");
		chdir($old_path);
	}

?>
<div id = 'text_container' class = 'container'>
	<div class = 'column-container left'>
		<? echo $column_left; ?>
	</div>
	<div class = 'column-container right'>
	</div>
</div>