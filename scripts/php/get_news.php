<?php
$db = new SQLite3("fb.db");
$results = $db->query("SELECT * FROM news");
while($row = $results->fetchArray())
{
	echo "<h3>".$row['title']."</h3>";
	echo "<p>".$row['content']."</p>";
}
echo "<a href='scripts/php/update_feed.php'>Feed</a>";
?>