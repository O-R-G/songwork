<?  
	$submit_id = end($oo->urls_to_ids(array('menu', 'submit')));
	$submit_item = $oo->get($submit_id);

	$column_left = $submit_item['deck'];
	$column_right = $submit_item['body'];
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