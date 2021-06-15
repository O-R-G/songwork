<?

if (isset($_GET['query']) && $_GET['query'] != 'Search for...') {
  $query = $_GET['query'];
  $query_json = str_replace(' ', '+', $query);
}
$no_results_error = 'The search query did not return any results.<br />Please <a href="#" onclick="show_search();focusSearchInput();">try again</a>.';

?>
<div id = 'search_control'>
  <div id = 'view_toggle'>
    <label class = 'radio_container'>Spreadsheet
      <input type = 'radio' name = 'catalogue_control' checked value = 'spreadsheet'><span class="checkmark"></span>
    </label>
    <label class = 'radio_container'>List
      <input type = 'radio' name = 'catalogue_control' value = 'list'><span class="checkmark"></span>
    </label>
  </div>
  <div id = 'filter'>
    <div>SEARCH BY</div><div id = 'search_keyword'><? echo $query; ?></div>
  </div>
</div>
<div id = 'search_container' class = 'container' view='spreadsheet'>
	<?
	if ($query) {
    	$children = build_children_search($oo, false, $query);
	}
	if (!$children || $searchQuery == "")
	     echo "<div id='search_error'>" . $no_results_error . "</div>";
	else
	 	print_search_children($oo, $children);
	
?>
</div>
<script>
	var sRadio_btn = document.querySelectorAll('.radio_container > input');
	var sSearch_container = document.getElementById('search_container');
	Array.prototype.forEach.call(sRadio_btn, function(el, i){
	    el.addEventListener('click', function(){
	      sSearch_container.setAttribute('view', el.value);
	    });
	});
</script>