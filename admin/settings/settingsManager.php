<?php

$currentConfigType = $_GET['configType'];
if($currentConfigType == 'basicSettings') {

	$companyName = $_GET['companyName'];
	$phoneNumber = $_GET['phoneNumber'];
	$city = $_GET['city'];
	$state = $_GET['state'];
	$pageName = 'basicSettings.json';	
	//Post New JSON Page
	
	$postData[] = array('Company Name'=> $companyName, 'Phone Number'=> $phoneNumber, 'City'=> $city, 'State'=> $state);
	$fp = fopen($pageName, 'w');
	fwrite($fp, json_encode($postData));
	fclose($fp);
	
}

?>