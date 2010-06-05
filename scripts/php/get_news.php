<?php
$db = new SQLite3("fb.db");
$results = $db->query("SELECT * FROM news ORDER BY id desc LIMIT 0,5");
echo "<h2><a href='news.php'>Nyheter:</a></h2>";
echo "<div id='accor'>";
while($row = $results->fetchArray())
{
	echo "<h3><a href='#'>".$row['title']."</a></h3>\n";
	echo "<div>";
	echo "<p>".$row['content']."</p>\n";
	echo "</div>";
}
echo "</div>";
echo "<a href='scripts/php/update_feed.php' class='feed'>Feed</a>";
?>