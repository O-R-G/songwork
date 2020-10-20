<?
$request = $_SERVER['REQUEST_URI'];
$requestclean = strtok($request,"?");
$uri = explode('/', $requestclean);
$view = "views/";

/* ------------------------------------------------------
        handle url:
        + /dev > gyroscope (plus hide the clock)
        + /thx > download
        + everything else > object-fullscreen
------------------------------------------------------ */

// show the things
require_once("views/head.php");
require_once("views/nav.php");

if (!$uri[1])
  require_once("views/home.php");
else if ($uri[1] =="resources")
  require_once("views/home.php");
else if($uri[1] == "catalogue")
  require_once("views/catalogue.php");
else if($uri[1] == "search")
  require_once("views/search.php");
else if($uri[1] == "upload")
  require_once("views/upload.php");
else if($uri[1] == 'submit' && count($uri) > 2)
  require_once("views/submit-response.php");
else if($uri[1] == 'recordings')
  require_once("views/detail.php");
else
  require_once("views/column.php");


require_once("views/foot.php");
?>
