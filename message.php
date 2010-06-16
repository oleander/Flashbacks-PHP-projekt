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

//$result = mysql_query('SELECT m.id, m.subject, m.unread, u.id AS userID, u.username FROM messages AS m LEFT JOIN users AS u ON m.from = u.id');
$result = mysql_query("SELECT m.id, m.subject, m.unread, u.id AS fromID, u.username AS fromName FROM messages AS m, users AS u WHERE m.from = u.id AND m.recipient = $_SESSION[userID]");
$messages = array();
$i = 0;
while($row = mysql_fetch_array($result))
{
	$messages[$i]['id'] = $row['id'];
	$messages[$i]['subject'] = htmlentities($row['subject']);
	$messages[$i]['from'] = htmlentities($row['fromName']);
	$messages[$i]['userID'] = $row['fromID'];
	$messages[$i]['unread'] = $row['unread'];
	$i++;
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
	<title><?php echo $cfg['titel']; ?></title>
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
			<div id="message">
<?php if(count($messages) > 0): ?>
				<table>
					<tr>
						<th>Rubrik</th>
						<th>Från</th>
						<th>Oläst</th>
					</tr>
<?php foreach($messages as $message): ?>
					<tr>
						<td><a href="#" onclick="$('#showMessage').dialog('open'); $('#showMessage').load('inc/showmessage.php?id=<?php echo $message['id']; ?>'); return false;"><?php echo $message['subject']; ?></a></td>
						<td><a href="profile.php?id=<?php echo $message['userID']; ?>"><?php echo $message['from']; ?></a></td>
						<td><?php echo ($message['unread']) ? 'Ja' : 'Nej'; ?></td>
					</tr>
<?php endforeach; ?>
				</table>
<?php else: ?>
				Här var det tomt!
<?php endif; ?>
			</div>
			<div id="showMessage" title="Meddelande">
			</div>
	</div>
</div>
</body>
</html>
