<?php
require('../../inc/mysql_config.php');

$to = mysql_real_escape_string($_POST['to']);
$message = mysql_real_escape_string(nl2br($_POST['message']));

mysql_query("INSERT INTO messages (recipient, message) VALUES ('".$to."', '".$message."')") or die(mysql_error());

header('Location: ../../profile.php');
?>

<pre>
<?php var_dump($_POST); ?>
</pre>
