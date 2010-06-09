<?php
require("passwords.php");

$hash = generateHash('login');
echo $hash;

$result =  matchPassword('login', $hash);

if($result)
	echo "stämmer";
else
	echo "stämmer inte";
?>	
