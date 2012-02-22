<? 
	session_start();
	session_destroy();
	header("location:http://dev.itsmontoya.com/admin/index.php");
	exit(0);
?>