<?php

// MySQL support required
require_once("../../inc/mysql_config.php");

$query = "SELECT * FROM news ORDER BY id DESC LIMIT 0,5"; 
$result = mysql_query($query);

// Tell the browser this is a rss-feed.
header("Content-Type: application/rss+xml");

// Following is a way to echo everything as it is
// until matching tag (in this case EOF)
// (Called "here notation")
// Bit of downside it has to have start tag at first
// column to work which screws indentation a bit.
echo <<<EOF
<?xml version='1.0' encoding='utf-8'?>
<rss version='2.0'>
	<channel>
		<title>Flashback Community News Feed</title>
		<link>http://localhost</link>
		<description>Flashbacks egna community</description>
EOF;

while($row = mysql_fetch_array($result))
{
	echo <<<EOF
	
		<item>
			<title>$row[title]</title>
			<link>http://localhost</link>
			<description>$row[content]</description>
		</item>
EOF;
}


echo <<<EOF
	</channel>
</rss>
EOF;

/*
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
*/
?>
