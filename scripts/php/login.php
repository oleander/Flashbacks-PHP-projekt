<?php
session_start();
if(isset($_POST['username']) && strlen($_POST['username']) > 0 && isset($_POST['password']) && strlen($_POST['password']) > 0)
{
	// We need SQL support and Error class
	// passwords.php to match password
	require_once("../../inc/mysql_config.php");
	require_once("../../inc/error.php");
	require_once("../../inc/passwords.php");
	
	$error = new Error();

	//Tar bort farliga tecken från sql-frågan för att förhindra sql-injections
	$username = mysql_real_escape_string($_POST['username']);
	$password = $_POST['password'];
	$result = mysql_query("SELECT * FROM users WHERE username = '" . $username . "'");

	// We should have one result if user exists
	if($row = mysql_fetch_array($result))
	{
		// Well usernames are unique so we can only get one result
		if($password == matchPassword($password, $row['password']))
		{
			// Passwords match - we're logged in!
			$_SESSION['userID'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['logged_in'] = true;
		}
		else
		{
			// Once again - we failed.
			$error->add("FAIL_LOGIN");
		}
	}
	else
	{
		$error->add("FAIL_LOGIN");
	}
}else {
	// We fail because nothing was really entered
	$error->add("FAIL_LOGIN");
}

header("Location: ../../index.php?error=".$error->getValue()."&login=1");
exit();
?>
