<?php
/*
 * This should just fetch a specific message if you are
 * the recipient.
 */

// Are we logged in?
session_start();
if(!isset($_SESSION['logged_in']))
{
	header('location: ../../index.php');
	die();
}

// MySQL support so we can get message and user
require_once('../../inc/mysql_config.php');

// We have a message ID to fetch?
if(isset($_GET['id']))
	$messageID = $_GET['id'];
else
	die();

// Get UserID
$userID = $_SESSION['userID'];

// Don't forget to search for our userID, we don't want
// others messages - do we? ;)
$query = "SELECT m.id, m.subject, m.message, m.from, u.username AS fromName 
	FROM messages AS m, users AS u 
	WHERE m.from = u.id
	AND m.id = $messageID
	AND m.recipient = $userID";

$result = mysql_query($query);

// We should have a message - we print it
if($row = mysql_fetch_array($result))
{
	$subject = htmlentities($row['subject'],  ENT_COMPAT, 'UTF-8');
	$fromName = htmlentities($row['fromName'], ENT_COMPAT, 'UTF-8');
	$message = nl2br(htmlentities($row['message'],  ENT_COMPAT, 'UTF-8'));
	$from = $row['from'];

	echo <<<EOF
	<b>Ämne: </b>$subject<br />
	<b>Från: </b><a href="profile.php?id=$from">$fromName</a><br /><br />
	<b>Meddelande:</b><br />
	$message
	<br /><br />
	<a href="message.php?to=$from"><b>Svara</b></a>
EOF;

	// We've read the message. Mark it as such.
	$query = "update messages set unread = 0 where id = $messageID";
	mysql_query($query);
}
else
{
	echo "Meddelandet finns inte.\n";
}
?>
