<?php

/*
if(class_exists('SQLiteDatabase'))
{
	echo "You have support for SQLite<br />\n";
}
else
{
	echo "You lack support for SQLite<br />\n";
}
*/
$dbname='base';
$base=new SQLiteDatabase($dbname, 0666, $err);
if ($err)
{ 
  echo "SQLite NOT supported.<br>\n";
  exit($err);
}
else
{
  echo "SQLite supported.<br>\n";
}  

?>
