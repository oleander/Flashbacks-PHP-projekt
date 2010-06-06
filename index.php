<?php 
    /* Hantering av konfigurering */
	
	require("inc/config.php");
    
    $GLOBALS["cfg"] = new Config();
    
    function cfg() {
        return $GLOBALS["cfg"];
    }
    
    /* Konfigueringar */
    cfg() -> set("titel", "FB-Community"); // En konfigurering 
    
    $cfg = cfg() -> get_all();
    
    /* Exempel på hur man kan hantera konfigueringar.
        $min_cfg["name"] = "Flashbackarn";
        $min_cfg["sex"] = "male";
        $min_cfg["age"] = 12;
        
        foreach ($min_cfg as $name => $value) {
            cfg() -> set($name, $value);
        }
    */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  

<head>  
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title><?php echo $cfg["titel"]; ?></title>
	<link rel="alternate" type="application/rss+xml" href="/inc/feed.xml" title="Flashback Community News Feed" />
	<link rel="stylesheet" href="css/stil1.css" type="text/css" />
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="scripts/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="scripts/js/jquery-ui-1.8.1.custom.min.js"></script>
	<script type="text/javascript" src="scripts/js/javascript.js"></script>
</head>  

<body>
<div id="wrapper">
	<div id="header">
		<div id="menu">
			<?php
				if (isset($_COOKIE["user"]))
					include 'inc/menu.php';
				else
					echo "Logga in för att se menyn";
			?>
		</div>
		<div id="meta">
			<ul>
				<?php
				if (isset($_COOKIE["user"]))
					echo "<li><a href='scripts/php/logout.php'>Logga ut</a></li>";
				else
					echo "<li><a href='#' id='login'>Logga in</a></li>";
				?>
			</ul>
		</div>
		<!--<div id="time">
			<?php include 'inc/time.php'; ?>
		</div>-->
	</div>
	<div id="content">
			<div id="loginDialog" title="Logga in">
				<form action="scripts/php/login.php" method="post">
					<label for="username">Användarnamn: </label><input type="text" name="username" id="username"/><br />
					<label for="password">Lösenord: </label><input type="password" name="password" id="password"/><br />
					<input type="submit" name="login_submit" value="Logga in"/>
					<p>Har du inget konto? <a href="#" id="register">Registrera dig</a></p>
				</form>
			</div>
			<div id="registerDialog" title="Registrera dig">
				<form action="scripts/php/register.php" method="post">
					<label for="username">Användarnamn: </label><input type="text" name="username" id="username"/><br />
					<label for="password">Lösenord (x2): </label><input type="password" name="password" id="password"/><br />
					<input type="password" name="password_again" id="password_again" /><br />
					<label for="email">E-post: </label><br /><input type="text" name="email" id="email" /><br />
					<input type="submit" name="register_submit" value="Registrera"/>
				</form>
			</div>
			<div id="news">
				<?php include 'scripts/php/get_news.php'; ?>
			</div>
	</div>
</div>
</body>
</html>
