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
	<link rel="stylesheet" href="css/stil1.css" type="text/css" />
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="scripts/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="scripts/js/jquery-ui-1.8.1.custom.min.js"></script>
	<script type="text/javascript">
	$.fx.speeds._default = 1000;
	$(function() {
		$('#dialog').dialog({
			autoOpen: false,
			show: 'fold',
			hide: 'fold',
			modal: true,
			resizable: false,
			draggable: false,
			closeOnEscape: false
		});
		
		$('#login').click(function() {
			$('#dialog').dialog('open');
			return false;
		});
	});
	var timer;
	var seconds = 1; // how often should we refresh the DIV?

	function startActivityRefresh() {
    timer = setInterval(function() {
			$('#time').load('inc/time.php');
		}, seconds*1000)
	}

	function cancelActivityRefresh() {
		clearInterval(timer);
	}
	
      $(document).ready(function() {
          $(function() {startActivityRefresh();});
      });
	</script>
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
			<div id="dialog" title="Logga in">
				<form action="login.php" method="post">
					<label for="username">Anv.namn: </label><input type="text" name="username" /><br />
					<label for="password">Lösenord: </label><input type="text" name="password" /><br />
					<input type="submit" name="login_submit" value="Logga in"/>
				</form>
			</div>
		<button id="login">Logga in</button>
	</div>
</div>
</body>
</html>
