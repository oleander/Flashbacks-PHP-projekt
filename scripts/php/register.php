<?php
session_start();
include "/../../inc/mysql_config.php";

$result = mysql_query("SELECT * FROM users WHERE username = '$_POST[username]'");


if (mysql_num_rows($result) == 1)
{
	echo "Det finns redan en användare med det användarnamnet";
}
else
{
	if ($_POST['password'] == $_POST['password_again'])
	{
		mysql_query("INSERT INTO users (username, password, email) VALUES ('$_POST[username]', '$_POST[password]', '$_POST[email]')");
		$_SESSION['userID'] = $_POST['username'];
		$_SESSION['username'] = $_POST['password'];
		$_SESSION['logged_in'] = true;
		header('Location: ../../index.php');
	}
	else
	{
		echo "Du skrev inte samma lösenord två gånger";
	}
}
?>