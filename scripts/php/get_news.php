<?php
include "/../../inc/mysql_config.php";

$result = mysql_query("SELECT * FROM news ORDER BY id desc LIMIT 0,5");

echo "<h2><a href='news.php'>Nyheter:</a></h2>";
echo "<div id='accor'>";
while($row = mysql_fetch_array($result))
{
	echo "<h3><a href='#'>".$row['title']."</a></h3>\n";
	echo "<div>";
	echo "<p>".$row['content']."</p>\n";
	echo "</div>";
}
echo "</div>";
echo "<a href='scripts/php/update_feed.php' class='feed'>Feed</a>";
?>