<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	header('location: ../../index.php');
	die();
}
require('../../inc/mysql_config.php');

if(isset($_POST['to']) && isset($_POST['message']))
{
	$to = mysql_real_escape_string($_POST['to']);
	$message = mysql_real_escape_string(nl2br($_POST['message']));
	$result = mysql_query("SELECT id FROM users WHERE username = '". $to . "' LIMIT 0, 1");
	if($row = mysql_fetch_array($result))
	{
		mysql_query("INSERT INTO messages (`recipient`, `message`, `from`) VALUES ('".$row['id']."', '".$message."', '".$_SESSION['userID']."')") or die(mysql_error());
		header('Location: ../../profile.php');
	}else {
		header('Location: ../../profile.php');
		die();
	}
}
?>