<?php

$conn = new mysqli('localhost','jmontoya_josh','bgvfcdxsza','devdb');
$conn->query('SET NAMES "utf8"');

$query = <<<EOQ
	INSERT INTO Users ('user', 'fullname', 'pass')
	VALUES ('josh', 'joshm', 'joshpass', 0)
EOQ;

$conn->query($query);
if($conn->errno !=0)
	echo "Something bad happened: " . $conn->error;
else 
	echo 'It worked!';
?>