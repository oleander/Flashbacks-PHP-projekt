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
