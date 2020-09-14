<?
	if($uri[2] == 'success'){
		
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