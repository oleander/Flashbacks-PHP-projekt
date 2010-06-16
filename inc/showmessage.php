<?php
/*
 * This should just fetch a specific message if you are
 * the recipient.
 */

// Are we logged in?
session_start();
if(!isset($_SESSION['logged_in']))
{
	header('location: index.php');
	die();
}

// MySQL support so we can get message and user
require_once('mysql_config.php');

// We have a message ID to fetch?
if(isset($_GET['id']))
	$messageID = $_GET['id'];
else
	die();

// Get UserID
$userID = $_SESSION['userID'];

// Don't forget to search for our userID, we don't want
// others messages - do we? ;)
$query = "SELECT m.id, m.subject, m.message, u.username AS fromName 
	FROM messages AS m, users AS u 
	WHERE m.from = u.id
	AND m.id = $messageID
	AND m.recipient = $userID";

$result = mysql_query($query);

// We should have a message - we print it
if($row = mysql_fetch_array($result))
{
	echo <<<EOF
	<b>Ämne: </b>$row[subject]<br />
	<b>Från: </b>$row[fromName]<br />
	<b>Meddelande:</b><br />
	$row[message]
EOF;
}
else
{
	echo "Meddelandet finns inte.\n";
}
?>
