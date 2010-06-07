<?php
session_start();
if(isset($_POST['username']) && strlen($_POST['username']) > 0 && isset($_POST['password']) && strlen($_POST['password']) > 0)
{
	include "/../../inc/mysql_config.php";
	//Tar bort farliga tecken från sql-frågan för att förhindra sql-injections
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$result = mysql_query("SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "' LIMIT 0, 1");


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
		header('Location: ../../index.php');
	}
}else {
	//To-do: Fixa så att det syns att inloggningen misslyckades
	header('Location: ../../index.php');
}
?>