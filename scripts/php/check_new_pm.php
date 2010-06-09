<?php

if(!isset($_SESSION['logged_in']))
{
	header('location: ../../index.php');
	die();
}

include "inc/mysql_config.php";

$result = mysql_query("SELECT * FROM messages WHERE recipient = '".$_SESSION['userID']."' AND unread = 1");
$num_rows = mysql_num_rows($result);

?>