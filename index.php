
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

<html>  

<head>  
    <title><?php echo $cfg["titel"]; ?></title>
	<link rel="stylesheet" href="stil1.css" type="text/css" />
</head>  

<body>  
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
                break;
            }
        }
        return $prime;
    }

    $text  = "Hej. Idag är det "; 
    $text2 = "Tiden är "; 
    $today = date('Y-m-d'); 
    $time  = date("H:i:s"); 
    $hemligSumma = array(10,20,30,40,50);
    $slumpadSida = array('www.flashback.org','http://www.piratpartiet.se/','www.google.se','www.php.net');

    echo $text . $today . "<br />" . $text2 . $time . "<br />" ;
    echo "Idag skall vi räkna matematik: ";
    
    if(isset($_POST['submit'])) 
    {    
        $summa = intval($_POST["ma1"])  + intval($_POST["ma2"]);
            echo $_POST["ma1"] . " + " . $_POST["ma2"] . " är lika med " .$summa. "<br /><br />";
    
        if($summa == $hemligSumma[mt_rand(0,4)])
        {
            echo "Du lyckades hitta det hemliga nummret du får en länk <br />". $slumpadSida[mt_rand(0,3)];
        }
        
        echo (isPrime($summa)) ? $summa . ' är ett primtal<br/>' : $summa . ' är inte ett primtal<br/>';
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="ma1" /> +
<input type="text" name="ma2" /><br />
<input type="submit" name="submit" value="Räkna" />
</form>
</body>

</html>
