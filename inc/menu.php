<?php

//Hämtar filnamn till aktuell sida
$current_file = basename($_SERVER['PHP_SELF']);
require("scripts/php/check_new_pm.php");
//Menyn, innehåller "Namn" => "Adress" och visas i ordningen de är skrivna i
$menu = array(
	'Hem' => 'index.php',
	'Profil' => 'profile.php',
	'Vänner' => 'friends.php',
	'Nyheter' => 'news.php',
	'Inställningar' => 'settings.php',
	'<u><strong>'.$num_rows.'</strong></u>' => 'message.php'
			 );
?>
<ul>
<?php foreach($menu as $name => $location): ?>
	<li><a href="<?php echo $location; ?>"<?php echo ($current_file == basename($location) ? ' id="current">' : '>') . $name; ?></a></li>
<?php endforeach; ?>
</ul>
