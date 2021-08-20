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
if(isset($item["name1"]))
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
    $thisPage = 'text';
}
else if ($uri[1] =='recordings')
{
    $isDetail = true;
    $thisPage = 'detail';
}
else{
	$thisPage = 'text';
}

$isHover = false;
if($isHome || $isDetail )
    $isHover = true;
?>
<!DOCTYPE html>
<html lang='en-GB'>
	<head>
		<title><? echo $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/fonts.css">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/global.css">
		<link rel="apple-touch-icon" href="<? echo $host; ?>media/png/touchicon.png" />
		<meta name="google-site-verification" content="YG-Tjy75z0WdQQX5WBjm3RDwyf6pnNeQQ81X0DEVpUE" />
		<link rel="icon" href="/media/png/favicon.png" type="image/png" sizes="16x16">
		<meta property="og:title" content="Song Work">
		<meta property="og:image" content="/media/png/favicon.png">
		<meta property="og:type" content="website">
		<meta name="description" content="Song Work is an audio library of workplace noise. The project functions both as a sound archive and a free resource for musicians and sound artists. Through music commissions and collaborations, Song Work aims to create new work songs for the 21st century. All sounds are Creative Commons Licensed. Share, browse and download. ">
		<meta name="keywords" content="Song Work">
		<script type = 'text/javascript'>
			var isHome = <? echo ($isHome ? 'true' : 'false') ; ?>;
			var isCatalogue = <? echo ($isCatalogue ? 'true' : 'false') ; ?>;
			var isSubmit = <? echo ($isSubmit ? 'true' : 'false') ; ?>;
			var isDetail = <? echo ($isDetail ? 'true' : 'false') ; ?>;
			var thisPage = '<? echo $thisPage; ?>';
		</script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-DTPFXQ8JHL"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-DTPFXQ8JHL');
		</script>
	</head>
<body class = '<? echo $thisPage; ?>'>
<script type = "text/javascript">
	var isHover = <?= json_encode($isHover); ?>;
	var isMobile = true;
	var body = document.body;
	if(window.innerWidth > 500){
		var isMobile = false;
		if(isHover)
			body.classList.add('hover');
	}
</script>

