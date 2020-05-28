<?  
	$column_left = $item['deck'];
	$column_right = $item['body'];
?>

<div class = 'container submit-container'>
	<form id = 'submit_form'>
	<div class = 'column-container left'>
		<? echo $column_left; ?>
	</div>
	<div class = 'column-container right'>
		<? echo $column_right; ?>
	</div>
	</form>
</div>