<?php

session_start();
include($_SERVER['DOCUMENT_ROOT'].'/assets/configFile.php');


$enteredUser = $_POST["User"];
$enteredPass = $_POST["Password"];
$processedPass = md5($enteredPass);

/*
$query = <<<EOQ
	SELECT * FROM Users
EOQ;
*/

$condition = "user_name = " . '"' . mysql_escape_string($enteredUser) . '"';

$query = "select * from Users where $condition";

$result = $conn->query($query);
if($conn->errno !=0)
	die('mysql error: ' . $conn->error);
else 
	while(($row = $result->fetch_assoc()) != null)
	{
		/*echo '<p>';
		var_dump($row);
		echo '</p>';*/
		
		if($row['password'] == $processedPass) {
			$_SESSION['user_name'] = $row['user_name'];
			header("location:http://dev.itsmontoya.com/admin/index.php");
			exit(0);
		}
	
	}
	
	$_SESSION['user_name'] = null;
	header("location:http://dev.itsmontoya.com/admin/index.php");
	exit(0);
	

/*

$key = 'password to (en/de)crypt';
$string = ' string to be encrypted '; // note the spaces
To Encrypt:

$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
To Decrypt:

$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

*/

?>