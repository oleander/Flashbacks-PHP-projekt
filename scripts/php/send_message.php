<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	header('location: ../../index.php');
	die();
}
require('../../inc/mysql_config.php');

if(isset($_POST['to'], $_POST['subject'], $_POST['message']))
{
	$to = mysql_real_escape_string($_POST['to']);
	$subject = mysql_real_escape_string($_POST['subject']);
	$message = mysql_real_escape_string($_POST['message']);
	$result = mysql_query("SELECT id FROM users WHERE username = '". $to . "' LIMIT 0, 1");
	if($row = mysql_fetch_array($result))
	{
		mysql_query("INSERT INTO messages (`recipient`, `subject`, `message`, `from`) VALUES ('".$row['id']."', '".$subject."', '".$message."', '".$_SESSION['userID']."')") or die(mysql_error());
		header('Location: ../../profile.php');
	}else {
		header('Location: ../../profile.php');
		die();
	}
}
?>
