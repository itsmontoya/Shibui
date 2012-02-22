<?php

	$getBasicSettings = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/admin/settings/basicSettings.json');	
	$basicSettings = json_decode($getBasicSettings,true);
	foreach ($basicSettings as $object) {
		$companyName = $object['Company Name'];
		$phoneNumber = $object['Phone Number'];
		$city = $object['City'];
		$state = $object['State'];
	}

?>