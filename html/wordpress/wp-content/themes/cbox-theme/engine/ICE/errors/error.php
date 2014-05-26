<!DOCTYPE html>
<html>
	<head>
		<title>A Really Bad Error</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<h2>
			A really bad error has occured.
		</h2>
		<div>
			Please contact this site's administrator.
		</div>
		<h4>
			Attention Administrator:
		</h4>
		<div>
			To enable more debug information,
			you will need to ADD this to wp-config.php or your functions.php:
			<pre>define('ICE_ERROR_REPORTING', true);</pre>
			To completely disable ICE error handling (not recommended),
			add the following to wp-config.php or your functions.php:
			<pre>define('ICE_ERROR_HANDLING', false);</pre>
		</div>
	</body>
</html>