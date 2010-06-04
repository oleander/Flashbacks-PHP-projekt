	$.fx.speeds._default = 250;
	$(function() {
		$('#loginDialog').dialog({
			autoOpen: false,
			show: 'fold',
			hide: 'fold',
			modal: true,
			resizable: false,
			draggable: false,
			closeOnEscape: false
		});
		
		$('#login').click(function() {
			$('#loginDialog').dialog('open');
			return false;
		});
		
		$("#registerDialog").dialog({
			autoOpen: false,
			show: 'fold',
			hide: 'fold',
			modal: true,
			resizable: false,
			draggable: false,
			closeOnEscape: false
		});
		
		$("#register").click(function() {
			$("#loginDialog").dialog('close');
			$("#registerDialog").dialog('open');
			return false;
		});
	});
/*	var timer;
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
      });*/