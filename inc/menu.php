<?php

//Hämtar filnamn till aktuell sida
$current_file = basename($_SERVER['PHP_SELF']);

//Menyn, innehåller "Namn" => "Adress"
$menu = array(
	'Hem' => 'index.php',
	'Vänner' => 'friends.php',
	'Nyheter' => 'news.php',
	'Inställningar' => 'settings.php'
			 );
?>
<ul>
<?php foreach($menu as $name => $location): ?>
	<li><a href="<?php echo $location; ?>"<?php echo ($current_file == basename($location) ? ' id="current">' : '>') . $name; ?></a></li>
<?php endforeach; ?>
</ul>
