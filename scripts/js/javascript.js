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