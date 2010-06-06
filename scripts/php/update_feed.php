<?php
$myFile = "../../inc/feed.xml";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "<?xml version='1.0' encoding='UTF-8'?>\n";
fwrite($fh, $stringData);
$stringData = "<rss version='2.0'>\n";
fwrite($fh, $stringData);
$stringData = "<channel>\n";
fwrite($fh, $stringData);
$stringData = "  <title>Flashback Community News Feed</title>\n";
fwrite($fh, $stringData);
$stringData = "  <link>http://localhost</link>";
fwrite($fh, $stringData);
$stringData = "  <description>Flashbacks egna community</description>";
fwrite($fh, $stringData);
include "/../../inc/mysql_config.php";

$result = mysql_query("SELECT * FROM news ORDER BY id desc LIMIT 0,5");

while($row = mysql_fetch_array($result))
{
$stringData = "  <item>";
fwrite($fh, $stringData);
$stringData = "    <title>".$row['title']."</title>";
fwrite($fh, $stringData);
$stringData = "    <link>http://localhost</link>";
fwrite($fh, $stringData);
$stringData = "    <description>".$row['content']."</description>";
fwrite($fh, $stringData);
$stringData = "  </item>";
fwrite($fh, $stringData);
}
$stringData = "</channel>\n";
fwrite($fh, $stringData);
$stringData = "</rss>\n";
fwrite($fh, $stringData);
fclose($fh);

header('Location: ../../inc/feed.xml');
?>