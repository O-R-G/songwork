<?  
$column_left = $item['deck'];
$column_right = $item['body'];
?>

<div id = '<? echo $thisPage; ?>_container' class = 'container '>
<? if($uri[1] == 'submit' && count($uri) == 2){ ?>
	<form id = 'submit_form' enctype="multipart/form-data" method = 'POST' action = '/upload'>
	<div class = 'column_container left'>
		<? echo $column_left; ?>
	</div><div class = 'column_container right'>
		<? echo $column_right; ?>
	</div>
	</form>
	<script>
		var acceptable_filetype = ['wav', 'mp3', 'm4a', 'aiff'];
		var upload_file = document.querySelector('input[type="file"]');

		function readURL(input) {
		    if (input.files && input.files[0]) {
		    	var filename = event.target.files[0].name;
		    	var lastDot = filename.lastIndexOf('.');
		    	var filetype = filename.substring(lastDot + 1);
		    	filetype = filetype.toLowerCase();

		    	if(acceptable_filetype.indexOf(filetype) == -1){
		    		alert('The selected filetype is not supported. Please convert it to .wav, .mp3, .m4a, or .aiff then try again.');
		    		input.value = '';
		    		return false;
		    	}
		    	if(input.files[0].size > 524288000){
		    		alert('The filesize exceeds the maximum limit (500 MB).');
		    		input.value = '';
		    		return false;
		    	}
		        
		    }
		}
		upload_file.addEventListener('change', function(){
			readURL(this);
		});
	</script>
<? } else { ?>
	<div class = 'column_container left'>
		<? echo $column_left; ?>
	</div><div class = 'column_container right'>
		<? echo $column_right; ?>
	</div>
<? } ?>
</div>
