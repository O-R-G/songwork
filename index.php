<?
$uri = explode('/', $_SERVER['REQUEST_URI']);
$view = "views/";

/* ------------------------------------------------------
        handle url:
        + /dev > gyroscope (plus hide the clock)
        + /thx > download
        + everything else > object-fullscreen
------------------------------------------------------ */

// show the things
require_once("views/head.php");

if ($uri[1] == "es" || !$uri[1])
  require_once("views/home.php");
else if ($uri[1] =="resources")
  require_once("views/home.php");
else if($uri[1] == "catalogue")
  require_once("views/catalogue.php");
else if($uri[1] == "submit")
  require_once("views/submit.php");
else
  require_once("views/detail.php");
require_once("views/nav.php");
require_once("views/foot.php");
?>
