<? 
	session_start();
	session_destroy();
	$reqURL = "http://".getenv("HTTP_HOST");
	header("location:".$reqURL);
	exit(0);
?>