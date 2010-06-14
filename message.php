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

if(isset($_GET['to']))
{
	$id = (preg_match("/^[0-9]+$/", $_GET['to'])) ? $_GET['to'] : $_SESSION['userID'];
}
$user = array('exists' => false);
if(isset($id))
{
	$result = mysql_query('SELECT username FROM users WHERE id = '.mysql_real_escape_string($id).' LIMIT 0, 1');
	//Gets user-data
	if($row = mysql_fetch_array($result))
	{
		$user['exists'] = true;
		$user['username'] = htmlentities($row['username']);
	}
}
	
/* Konfigueringar */
cfg() -> set('titel', 'Skicka PM - FB-Community'); // En konfigurering 
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
			<?php if(!isset($_GET['action'])) { ?>
			<?php if ($_GET['action'] = 'new') {?>
			<div id="message">
				<form action="scripts/php/send_message.php" method="post">
					Mottagare:<br/>
					<input name="to" type="text" style="font-weight:bold;" value="<?php echo ($user['exists']) ? $user['username'] : ''; ?>" size="33"/><br/>
					Rubrik:<br/>
					<input name="subject" type="text" style="font-weight:bold;" size="33"/><br/><br/>
					Meddelande:<br/><textarea name="message" rows="10" cols="30"></textarea><br/>
					<input type="submit" name="submit" value="Skicka"/>
				</form>
			</div>
			<?php } else {?>
			Hej
			<?php } } else {?>
			hejdå
			<?php }?>
	</div>
</div>
</body>
</html>