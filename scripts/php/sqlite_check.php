<?php

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
