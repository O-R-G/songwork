<?  
$column_left = $item['deck'];
$column_right = $item['body'];
?>

<div id = '<? echo $thisPage; ?>_container' class = 'container '>
<? if( ($uri[1] == 'submit' || $uri[1] == 'consent') && count($uri) == 2){ 
	if( $uri[1] == 'submit' )
		$send_to = 'recordings';
	elseif( $uri[1] == 'consent' )
		$send_to = 'consent';
	?>
	<form id = 'submit_form' enctype="multipart/form-data" method = 'POST' action = '/upload'>
	<div class = 'column_container left'>
		<? echo $column_left; ?>
	</div><div class = 'column_container right'>
		<? echo $column_right; ?>
	</div>
	<input type = 'hidden' name = 'send_to' value = '<?= $send_to; ?>'>
	</form>
	<script>
		var submit_to = '<?= $uri[1]; ?>';
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
		if(upload_file != null){
			upload_file.addEventListener('change', function(){
				readURL(this);
			});
		}
		

		var sSubmit_form = document.getElementById('submit_form');
		var fields = document.querySelectorAll('#submit_form input[name], #submit_form textarea[name]');
		var isValid = true;

		sSubmit_form.addEventListener('submit', function(e){
			e.preventDefault();
			var err_arr = [];
			var date = [];
			var time = [];
			[].forEach.call(fields, function(el, i){
				if(el.type == 'checkbox'){
					if(!el.checked)
					{
						err_arr.push(el.getAttribute('name').toUpperCase());
						el.classList.add('error');
					}
					else
					{
						el.classList.remove('error');
					}
				}
				else{
					if( !el.value && el.getAttribute('name') != 'min' && el.getAttribute('name') !== 'sec'){
						// min and sec could be zero
						err_arr.push(el.getAttribute('name').toUpperCase());
						el.classList.add('error');
					}
					else if( el.tagName == 'textarea' )
					{
						var word_count = el.value.split(' ').length;
						if(word_count > 150){
							isValid = false;
							err_arr.push('DESCRIPTION (word count)');
							el.classList.add('error');
						}
						else
						{
							el.classList.remove('error');
						}
						
					}
					else if(el.getAttribute('name') == 'day')
					{
						var enteredDay = Number(el.value);
						date.push(enteredDay);
						
						if(enteredDay > 31 || enteredDay < 1){
							err_arr.push('DATE');
							el.classList.add('error');
						}
						else 
						{
							el.classList.remove('error');
							if(enteredDay < 10)
								el.value = '0' + enteredDay;
						}
					}
					else if(el.getAttribute('name') == 'month')
					{
						var enteredMonth = Number(el.value);
						date.push(enteredMonth);
						
						var short_month = [4, 6, 9, 11];
						if( (enteredMonth > 12 || enteredMonth < 1) ||
							(short_month.includes(enteredMonth) && date[0] > 30 ) ||
							(enteredMonth == 2 && date[0] > 29)
						){
							err_arr.push('DATE');
							el.classList.add('error');
						}
						else
						{
							el.classList.remove('error');
							if(enteredMonth < 10)
								el.value = '0' + enteredMonth;
						}
					}
					else if(el.getAttribute('name') == 'year')
					{
						var enteredYear = Number(el.value);
						date.push(enteredYear);
						
						if(enteredYear % 4 !== 0 && date[1] == 2 && date[0] > 28){
							err_arr.push('DATE');
							el.classList.add('error');
						}
						else
						{
							el.classList.remove('error');
						}
					}
					else if(el.getAttribute('name') == 'min')
					{
						var enteredMin = Number(el.value);
						time.push(enteredMin);
						if(enteredMin > 59){
							// if min > 59
							err_arr.push('DURATION');
							el.classList.add('error');
						}
						else 
						{
							el.classList.remove('error');
							if(enteredMin < 10)
								el.value = '0' + enteredMin;
						}
					}
					else if(el.getAttribute('name') == 'sec'){
						var enteredSec = Number(el.value);
						if(enteredSec > 59 || (time[0] == 0 && enteredSec == 0)){
							// if sec > 59 or 00:00
							err_arr.push('DURATION');
							el.classList.add('error');
						}
						else
						{
							el.classList.remove('error');
							if(enteredSec < 10)
								el.value = '0' + enteredSec;
						}
					}
					else{
						el.classList.remove('error');
					}
				}
				
				
			});

			if(err_arr.length == 0)
				sSubmit_form.submit();
			else{
				if(err_arr.includes('DESCRIPTION (word count)')){
					var err_msg = 'Please limit your DESCRIPTION to 150 words then submit again.';
				}
				else{
					var err_msg = 'Please check the fields marked red then submit again.';
				
				}
				alert(err_msg);
			}
		});
		// date
		var date_input = document.querySelectorAll('.date-input, .duration-input');
		[].forEach.call(date_input, function(el, i){
			// prevent non numeral
			el.onkeypress = function(evt) {
				evt = evt || window.event;
			    if(
			    	//0~9
			        (evt.keyCode >= 48 && evt.keyCode <= 57) ||
			        //backspace
			    	(evt.keyCode == 8) ||
			        //tab
			        (evt.keyCode == 9) ||
			        //enter
			        (evt.keyCode == 13) 
	        
	        	) {
				    return true;
			    }
			    evt.preventDefault();
		        evt.stopPropagation();
		        return false;
			}
		});
		
	</script>
<? } else if($uri[1] == 'blog' && count($uri) < 3) { 
	$column_left = '';
	$column_right = '';
	$fields = array("objects.*");
	$tables = array("objects", "wires");
	$where	= array("wires.fromid = '".$item['id']."'",
					"wires.active = 1",
					"wires.toid = objects.id",
					"objects.active = '1'");
	$order 	= array("objects.begin DESC", "objects.end", "objects.name1");
	$children = $oo->get_all($fields, $tables, $where, $order);
	foreach($children as $child){
		if(substr($child['name1'], 0, 1) != '.')
		{
			$date = $child['begin'];
			$date_formatted = date( 'j F Y', strtotime($date));
			$excerpt = $child['notes'];
			$title = $child['name1'];
			$url = '/blog/' . $child['url'];
			$column_left .= '<div class="blog-item"><div class="blog-item-date">'.$date_formatted.'</div><div><a href="'.$url.'">'.$title.'</a></div><div class="blog-item-excerpt">'.$excerpt.'</div></div>';
		}
	}
	?>
	<div class = 'column_container left'>
		<? echo $column_left; ?>
	</div><div class = 'column_container right'>
		<? echo $column_right; ?>
	</div>
<? } else { ?>
	<div class = 'column_container left'>
		<? echo $column_left; ?>
	</div><div class = 'column_container right'>
		<? echo $column_right; ?>
	</div>
<? } ?>
</div>
<script>
	window.addEventListener('load', function(){
		var wW = window.innerWidth;
		if(wW <= 500)
		{
			var sIframe = document.querySelectorAll('iframe');
			if(sIframe.length > 0)
			{
				var iframeParent_w = sIframe[0].parentNode.offsetWidth;
				[].forEach.call(sIframe, function(el, i){
					var this_w = el.getAttribute('width');
					var this_h = el.getAttribute('height');
					if(this_w > iframeParent_w)
					{
						el.setAttribute('width', '100%');
						el.setAttribute('height', this_h * (iframeParent_w - 40) / this_w);
					}
					else
						return false;

				});
			}
		}
		
	});
</script>