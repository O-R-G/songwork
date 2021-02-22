<?

	$column_left = $item['deck'];
	if($uri[2] == 'success'){
		// $audio_filename = $_POST['audio_filename'];
		// $audio_filename = slug($_POST['audio_filename']);
		// $audio_duration = $_POST['audio_duration'];
		// $audio_filename = str_replace(" ", "_", $_POST['audio_filename']);
		$old_path = getcwd();
		chdir('/var/www/app/songwork-app/_make/');
		// chdir('/Users/ouerohiroshi/sketchbook/songworks-local/_make/');
		$output = shell_exec("./__make.sh 1>>debug.log 2>&1 &");
		chdir($old_path);

		$contributer = $_POST['forename'] . ' ' . $_POST['surname'];
		$msg = $contributer . " just submitted to songwork.org\r\n\r\nHere's the description of the audio:\r\n";
		$msg .= $_POST['audio_filename'];
		$msg = wordwrap($msg, 70, "\r\n");

		$headers = 'From: info@songwork.org' . "\r\n" ;
        $headers .='Reply-To: info@songwork.org' . "\r\n" ;
        $headers .='X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";  

		mail('weiwanghasbeenused@gmail.com', 'New submission on songwork.org', $msg, $headers);
	}

?>
<div id = 'text_container' class = 'container'>
	<div class = 'column-container left'>
		<? echo $column_left; ?>
	</div>
	<div class = 'column-container right'>
	</div>
</div>