<?php
/* SQLite med PDO
	$db = new PDO('sqlite:fb.db');

	$results = $db->query("select * from users");

	foreach($results as $result)
	{
		echo "User: ".$result['namn']." - Pass: ".$result['pass']."<br />\n";
	}

	$db = NULL;
*/

$db = new SQLite3("fb.db");
$results = $db->query("SELECT * FROM users");
while($row = $results->fetchArray())
{
	echo $row['namn'] ." with password ". $row['pass'] ."<br />\n";
}
?>

