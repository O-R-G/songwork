<?
// path to config file
$config = $_SERVER["DOCUMENT_ROOT"];
$config = $config."/open-records-generator/config/config.php";
require_once($config);

// specific to this 'app'
$config_dir = $root."config/";
require_once($config_dir."url.php");
require_once($config_dir."request.php");

$db = db_connect("guest");

$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();
// $rr = new Request();

// self
if($uu->id)
	$item = $oo->get($uu->id);
else
	$item = $oo->get(0);
$name = ltrim(strip_tags($item["name1"]), ".");
$lib_path = $_SERVER["DOCUMENT_ROOT"].'/lib/lib.php';
require_once($lib_path);
$title = "Song Work";

$isHome = false;
$isCatalogue = false;
$isDetail = false;
$isSubmit = false;
if (!$uri[1])
{
    $isHome = true;
    $thisPage = 'home';
}
else if ($uri[1] =="catalogue")
{
    $isCatalogue = true;
    $thisPage = 'catalogue';
}
else if ($uri[1] =="submit")
{
    $isSubmit = true;
    $thisPage = 'submit';
}
else if ($uri[1] !=="about" &&  $uri[1] !=="credit" )
{
    $isDetail = true;
    $thisPage = 'detail';
}
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/fonts.css">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/global.css">
		<link rel="apple-touch-icon" href="<? echo $host; ?>media/png/touchicon.png" />
		<meta name="google-site-verification" content="YG-Tjy75z0WdQQX5WBjm3RDwyf6pnNeQQ81X0DEVpUE" />

		<meta property="og:title" content="Song Work">
		<meta property="og:image" content="https://songwork.org/media/00113.png">
		<meta property="og:type" content="website">
		<meta name="description" content="Materia Abierta is an independent summer program on theory, art, and technology based in Mexico City.">
		<meta name="keywords" content="summer,program,theory,art,technology,school,computing,seminar,lecture,mexico">
		<script type = 'text/javascript'>
			var isHome = <? echo ($isHome ? 'true' : 'false') ; ?>;
			var isCatalogue = <? echo ($isCatalogue ? 'true' : 'false') ; ?>;
			var isSubmit = <? echo ($isSubmit ? 'true' : 'false') ; ?>;
			var isDetail = <? echo ($isDetail ? 'true' : 'false') ; ?>;
			var thisPage = '<? echo $thisPage; ?>';
		</script>
	</head>
<body class = '<? echo $thisPage; ?>'>

