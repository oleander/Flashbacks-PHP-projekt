<?php

//Hämtar filnamn till aktuell sida
$current_file = basename($_SERVER['PHP_SELF']);

//Olika alternativen
$meny1_namn = 'Hem';
$meny1_url = 'index.php';

$meny2_namn = 'Vänner';
$meny2_url = 'friends.php';

$meny3_namn = 'Nyheter';
$meny3_url = 'news.php';

$meny4_namn = 'Inställningar';
$meny4_url = 'settings.php';

//Själva menyn.
echo "<ul>";
echo "\n";
// MENY 1
echo '<li><a href="'.$meny1_url.'"';
if ($current_file == basename($meny1_url)) {echo 'id="current"';}
echo '>'.$meny1_namn.'</a>';
echo '</li>';
echo "\n";
// MENY 2
echo'<li><a href="'.$meny2_url.'"';
if ($current_file == basename($meny2_url)) {echo 'id="current"';}
echo '>'.$meny2_namn.'</a>';
echo '</li>';
echo "\n";
// MENY 3
echo'<li><a href="'.$meny3_url.'"';
if ($current_file == basename($meny3_url)) {echo 'id="current"';}
echo '>'.$meny3_namn.'</a>';
echo '</li>';
echo "\n";
// MENY 4
echo '<li><a href="'.$meny4_url.'"';
if ($current_file == basename($meny4_url)) {echo 'id="current"';}
echo '>'.$meny4_namn.'</a>';
echo '</li>';
echo "\n";
//Slut
echo "</ul>";
echo "\n";
?>
