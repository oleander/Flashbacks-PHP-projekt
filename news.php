<?php
session_start();
if(!isset($_SESSION['logged_in']))
	header('location: index.php');
/* Hantering av konfigurering */
	
require("inc/config.php");
require('inc/mysql_config.php');
    
$GLOBALS["cfg"] = new Config();
    
function cfg() {
	return $GLOBALS["cfg"];
}
    
/* Konfigueringar */
cfg() -> set("titel", "Nyheter - FB-Community"); // En konfigurering 
    
$cfg = cfg() -> get_all();
    
/* Exempel på hur man kan hantera konfigueringar.
$min_cfg["name"] = "Flashbackarn";
$min_cfg["sex"] = "male";
$min_cfg["age"] = 12;
        
foreach ($min_cfg as $name => $value) {
	cfg() -> set($name, $value);
}
*/

$printAllNews = true;
if(isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id']))
{
	$result = mysql_query('SELECT * FROM news WHERE id='.$_GET['id'].' LIMIT 0, 1');
	if(mysql_num_rows($result) == 1)
		$printAllNews = false;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  

<head>  
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title><?php echo $cfg["titel"]; ?></title>
	<link rel="alternate" type="application/rss+xml" href="/inc/feed.xml" title="Flashback Community News Feed" />
	<link rel="stylesheet" href="css/stil1.css" type="text/css" />
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="scripts/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="scripts/js/jquery-ui-1.8.1.custom.min.js"></script>
	<script type="text/javascript" src="scripts/js/javascript.js"></script>
</head>  

<body>
<div id="wrapper">
	<div id="header">
		<div id="menu">
			<?php
					include 'inc/menu.php';
			?>
		</div>
		<div id="meta">
			<ul>
				<li><a href='scripts/php/logout.php'>Logga ut</a></li>
			</ul>
		</div>
		<!--<div id="time">
			<?php include 'inc/time.php'; ?>
		</div>-->
	</div>
	<div id="content">
			<div id="intro">
<?php
if($printAllNews)
{
	$result = mysql_query('SELECT * FROM news ORDER BY id DESC');
?>
				<h1>Nyheter</h1>
<?php while($row = mysql_fetch_array($result)): ?>
				<div class="single_news">
				<h3><a href="?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
				<p><?php echo $row['content']; ?></p>
				<h5>Datum: <?php echo substr($row['time'], 0,10); ?><br />
				Av: <a href="profile.php?id=lars_id"><?php echo $row['publisher']; ?></a><h5>
				</div>
<?php
endwhile;
}else {
	if($row = mysql_fetch_array($result)):
?>
				<h1><?php echo $row['title']; ?></h1>
				<p><?php echo $row['content']; ?></p>
				<p><?php echo $row['time']; ?></p>
				<p><a href="news.php">Tillbaka</a></p>
<?php 
	endif;
}
?>
			</div>
	</div>
</div>
</body>
</html>