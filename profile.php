<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	header('location: index.php');
	die();
}
	
require('inc/mysql_config.php');	
require('inc/config.php');
    
$GLOBALS['cfg'] = new Config();
    
function cfg() {
	return $GLOBALS['cfg'];
}

if(isset($_GET['id']))
{
	$id = (preg_match("/^[0-9]+$/", $_GET['id'])) ? $_GET['id'] : $_SESSION['userID'];
}else {
	$id = $_SESSION['userID'];
}
$profile = array('exists' => false);
$result = mysql_query('SELECT id, username, email, regdate FROM users WHERE id = '.mysql_real_escape_string($id).' LIMIT 0, 1');
//Gets all profile data
if($row = mysql_fetch_array($result))
{
	$profile['exists'] = true;
	$profile['id'] = $row['id'];
	$profile['username'] = htmlentities($row['username']);
	$profile['email'] = htmlentities($row['email']);
	$profile['regdate'] = htmlentities($row['regdate']);
}
$title = ($profile['exists']) ? $profile['username'] : 'Unknown';
	
/* Konfigueringar */
cfg() -> set('titel', $title.' - FB-Community'); // En konfigurering 
$cfg = cfg() -> get_all();
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
			<div id="profile">
<?php if(!$profile['exists']): ?>
				<h1>Användaren finns inte</h1>
				<a href="profile.php?id">Min profil</a>
<?php else: ?>
				<h1><?php echo $profile['username']; ?></h1>
				<p><strong>Kontakt:</strong><br/>
				Email: <a href="mailto:<?php echo $profile['email']; ?>"><?php echo $profile['email']; ?></a><br/>
				<a href="message.php?to=<?php echo $profile['id']; ?>">Skicka meddelande</a></p>
				<p><strong>Fakta:</strong><br/>
				Medlem sedan: <?php echo $profile['regdate']; ?><br/></p>
<?php endif; ?>
			</div>
	</div>
</div>
</body>
</html>