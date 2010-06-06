<?php
$database = new SQLite3("../../fb.db");
$username = $_POST['username'];
$password = $_POST['password'];
$results = $db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

if($result = $database->query($query, SQLITE_BOTH, $error))
{ 
	echo "Olycka!";
}
else
{
	echo "Lycka!";
}
?>