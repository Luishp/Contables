<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//ES' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='es' lang='es'>
<head>
	<meta http-equiv='content-language' content='es' />
	<meta http-equiv='content-type' content='text/html;charset=utf-8' />
	<meta name='robots' content='index, follow' />
	<meta name='author' content='Chali' />
	<meta name='copyright' content='Chali. Todos los derechos reservados .' />
	
	<link rel='stylesheet' type='text/css' href='calendario/css/page.css' media='screen' />
	<link rel='stylesheet' type='text/css' href='calendario/css/calendar-eightysix-v1.1-default.css' media='screen' />
	<link rel='stylesheet' type='text/css' href='calendario/css/calendar-eightysix-v1.1-vista.css' media='screen' />
	<link rel='stylesheet' type='text/css' href='calendario/css/calendar-eightysix-v1.1-osx-dashboard.css' media='screen' />
	
	<script type='text/javascript' src='calendario/js/mootools-1.2.4-core.js'></script>
	<script type='text/javascript' src='calendario/js/mootools-1.2.4.4-more.js'></script>
	<script type='text/javascript' src='calendario/js/calendar-eightysix-v1.1.js'></script>
	
	<script type='text/javascript'>
		window.addEvent('domready', function() {

			new CalendarEightysix('exampleIII', { 'startMonday': true, 'format': '%Y-%m-%d', 'toggler': 'exampleIII-picker', 'offsetY': -4 });
	
		
		});	
	</script>
	
	<title>Calendar Eightysix version 1.1</title>
</head>
<body>

				<input id='exampleIII' name='dateIII' type='text' maxlength='10' style='padding-right: 22px;' />
				<div class='picker inElement' id='exampleIII-picker'></div>

	<br /><br /><br /><br /><br /><br /><br /><br /><br />
</body>
</html>