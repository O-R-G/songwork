<? 
  $about_id = end($oo->urls_to_ids(array('menu', 'about')));
  $about_item = $oo->get($about_id);

  $column_left = $about_item['deck'];
  $column_right = $about_item['body'];
?>

<div class = 'container about-container'>
  <div class = 'column-container left'>
    <? echo $column_left; ?>
  </div>
  <div class = 'column-container right'>
    <? echo $column_right; ?>
  </div>
</div>