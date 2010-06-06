<?php
session_start();
include "/../../inc/mysql_config.php";

$result = mysql_query("SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'");


if (mysql_num_rows($result) == 0)
{
	echo "olycka";
}
else
{
	while($row = mysql_fetch_array($result))
	{
		$_SESSION['userID'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['logged_in'] = true;
	}
	header('Location: http://localhost/');
}
?>