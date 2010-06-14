<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title><?php echo $title; ?></title>
	<link rel="alternate" type="application/rss+xml" href="scripts/php/update_feed.php" title="Flashback Community News Feed" />
	<link rel="stylesheet" href="css/stil1.css" type="text/css" />
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="scripts/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="scripts/js/jquery-ui-1.8.1.custom.min.js"></script>
	<script type="text/javascript" src="scripts/js/javascript.js"></script>
<?php 
if(isset($javascripts))
{
	foreach($javascripts as $javascript)
		echo "\t<script type=\"text/javascript\" src=\"scripts/js/".$javascript."\"></script>" . PHP_EOL;
}
?>
</head>  

<body>
<div id="wrapper">
	<div id="header">
		<div id="menu">
<?php
				if(isset($_SESSION['logged_in']))
					include 'inc/menu.php';
				else
					echo 'Logga in för att se menyn' . PHP_EOL;
?>
		</div>
		<div id="meta">
			<ul>
<?php if(isset($_SESSION['logged_in'])): ?>
					<li><a href="scripts/php/logout.php">Logga ut</a></li>
<?php else: ?>
					<li><a href="#" id="login">Logga in</a></li>
<?php endif; ?>
			</ul>
		</div>
	</div>
	<div id="content">
