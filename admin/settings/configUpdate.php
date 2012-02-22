<?php

$phoneNumber = $_GET["phoneNumber"];
$pageName = 'config.json';

//Post New JSON Page
$postData[] = array('Phone Number'=> $phoneNumber);

$fp = fopen($pageName, 'w');
fwrite($fp, json_encode($postData));
fclose($fp);

?>