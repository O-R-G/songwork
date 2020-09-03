<?  

$column_left = $item['deck'];
$column_right = $item['body'];
?>

<div id = '<? echo $thisPage; ?>_container' class = 'container '>
<? if($uri[1] == 'submit'){ ?>
	<form id = 'submit_form' enctype="multipart/form-data" method = 'POST' action = '/upload'>
	<div class = 'column_container left'>
		<? echo $column_left; ?>
	</div><div class = 'column_container right'>
		<? echo $column_right; ?>
	</div>
	</form>
<? } else { ?>
	<div class = 'column_container left'>
		<? echo $column_left; ?>
	</div><div class = 'column_container right'>
		<? echo $column_right; ?>
	</div>
<? } ?>
</div>