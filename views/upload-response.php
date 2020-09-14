<?
	if($uri[2] == 'success'){
		// execute bash code
		$old_path = getcwd();
		chdir('/var/www/app/songwork-app/_make/');
		$output = shell_exec('./__make.sh 1>>debug.log 2>&1');
		chdir($old_path);
		echo "<pre>".$output."</pre>";
		$column_left = 'Thanks for contributing to Songwork.org.';
	}
	elseif($uri[2] == 'error')
		$column_left = 'Something went wrong. Please try again or contact us for help.';
?>
<div class = 'container <? echo $uri[2]; ?>-container'>
	<div class = 'column-container left'>
		<? echo $column_left; ?>
	</div>
	<div class = 'column-container right'>
	</div>
</div>