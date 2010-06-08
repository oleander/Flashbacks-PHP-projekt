<?php
session_start();
if(isset($_POST['username']) && strlen($_POST['username']) > 4 && isset($_POST['password']) && strlen($_POST['password']) > 0 
	&& isset($_POST['email']) && strlen($_POST['email']) > 0 && isset($_POST['password_again']) && strlen($_POST['password_again']) > 0)
{
	include "../../inc/mysql_config.php";
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$password_again = mysql_real_escape_string($_POST['password_again']);
	$email = mysql_real_escape_string($_POST['email']);
	$result = mysql_query("SELECT COUNT(username) FROM users WHERE username = '". $username . "' LIMIT 0, 1");


	if (mysql_result($result, 0) == 1)
	{
		echo "Det finns redan en användare med det användarnamnet";
	}
	else
	{
		if ($password == $password_again)
		{
			mysql_query("INSERT INTO users (username, password, email) VALUES ('".$username."', '".md5($password)."', '".$email."')");
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
}else {
	//To-do: Skickas till startsidan/registreringen där felen skall stå skrivna. Fult med en vit sida.
	echo 'Alla fält är inte ifyllda';
}
?>
