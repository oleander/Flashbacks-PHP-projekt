<?php
$db_host="localhost";
$db_name="flashback";
$username="flashbackarn";
$password="dinmamma";
$db_con=mysql_connect($db_host,$username,$password);
$connection_string=mysql_select_db($db_name);

mysql_connect($db_host,$username,$password);
mysql_select_db($db_name);
mysql_query("SET NAMES 'utf8'") or die(mysql_error());
mysql_query("SET CHARACTER SET 'utf8'") or die(mysql_error());
?>
