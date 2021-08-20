<?
$o = $oo->get($uu->id);
if (isset($_GET['query']) && $_GET['query'] != 'Search for...') {
  $query = $_GET['query'];
  $query_json = str_replace(' ', '+', $query);
}

/* config */

// $roots = build_roots($oo, 0);
// $root_name = $uri[1];
// $page_name = $o['name1'];
// $page_name = trim_prefixes($page_name);
// $media = $oo->media($uu->id);
$sql_seasons = "SELECT id FROM objects WHERE name1 = 'Seasons' AND active = 1";
$seasons_id = $db->query($sql_seasons)->fetch_assoc()["id"];
$seasons = $oo->children($seasons_id);
foreach($seasons as &$s)
    $s['children'] = $oo->children($s['id']);
$items_max = 100;
$thumbs_max = 1;
if ((!$days) && (!$uri[1])) $days = 28;

// limit loading if nothing
if (!isset($_GET['query']))
  $archive = $date;

$no_results_error = 'The search query did not return any results.<br />Please <a href="#" onclick="show_search();focusSearchInput();">try again</a>.';

/* html */

?>
<div id="title" class="head <? echo ($menu) ? 'hide' : 'show'; ?> <? echo $class; ?>">
    <a href="#" onclick="show_search();focusSearchInput();"><span class='title'><?= $searchQuery; ?></span></a>
</div>
<!-- docket --><?

?><div id="search" class="<? echo ($menu) ? "hide" : "show"; ?>"><?
  if ($query) {
    $ladder = true;
    $children = build_children_search($oo, $ww, $query);

    foreach($children as $child) {
        display_child($oo, $child, TRUE, $thumbs_max, TRUE, FALSE, FALSE, TRUE, $seasons, FALSE, FALSE);
    }
  }
  if (!$children || $searchQuery == "")
      echo "<div class='item " . $class. "'>
          <div class='description sans'>" . $no_results_error . "</div>
      </div>";
?></div><?

/* js */

?>
