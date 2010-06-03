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
<html>  

<head>  
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title><?php echo $cfg["titel"]; ?></title>
	<link rel="stylesheet" href="stil1.css" type="text/css" />
</head>  

<body>
<div id="wrapper">
	<div id="header">
		<div id="menu">
			<?php include 'inc/menu.php'; ?>
		</div>
		<div id="time">
			<?php include 'inc/time.php'; ?>
		</div>
	</div>
	<div id="content">
<?php   
    function isPrime($number)
    {
        $sqrt = ceil(sqrt($number));
        $prime = true;
        for($i = 2; $i <= $sqrt; $i++)
        {
            if(($number % $i) == 0 && $i != $number)
            {
                $prime = false;
            }
        }
        return $prime;
    }
	  
	$hemligSumma = array(10,20,30,40,50);
    $slumpadSida = array('http://www.flashback.org','http://www.piratpartiet.se/','http://www.google.se','http://www.php.net');
    echo "Idag skall vi räkna matematik: ";
    
    if(isset($_POST['submit'])) 
    {    
        $summa = intval($_POST["ma1"])  + intval($_POST["ma2"]);
            echo $_POST["ma1"] . " + " . $_POST["ma2"] . " är lika med " .$summa. "<br /><br />";
    
        if($summa == $hemligSumma[mt_rand(0,4)])
        {
            echo "Du lyckades hitta det hemliga nummret du får en länk <br />". $slumpadSida[mt_rand(0,3)] ."<br />\n";
        }
        
        echo (isPrime($summa)) ? $summa . ' är ett primtal<br/>' : $summa . ' är inte ett primtal<br/>';
    }
?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="ma1" /> +
		<input type="text" name="ma2" /><br />
		<input type="submit" name="submit" value="Räkna" />
		</form>
		<form action="login.php" method="post">
			<label for="username">Anv.namn: </label><input type="text" name="username" /><br />
			<label for="password">Lösenord: </label><input type="text" name="password" /><br />
			<input type="submit" name="login_submit" value="Logga in"/>
		</form>
	</div>
</div>
</body>
</html>
