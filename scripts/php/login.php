<?php
include "/../../inc/mysql_config.php";

$result = mysql_query("SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'");


if (mysql_num_rows($result) == 0)
{
	echo "olycka";
}
else
{
	setcookie("user", $_POST['username'], time()+3600, '/');
	header('Location: http://localhost/');
}
	
/*while($row = mysql_fetch_array($result))
{
	echo "<p><b>".$row['username']."</b> with password: <b>".$row['password']."</b> and email: <b>".$row['email']."</b></p>\n";
}*/
?>