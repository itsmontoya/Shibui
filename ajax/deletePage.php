<?php
	session_start();
	if($_SESSION['user_name'] != null){
		$docRoot = $_SERVER['DOCUMENT_ROOT'];
		$fileName = $_GET["jsonName"] . ".json";
		$Title = $_GET["Title"];
		
		$getNav = file_get_contents($docRoot.'/admin/settings/navigation.json');
		$decodedNav = json_decode($getNav,true);
		$navTitle = array('pageName'=> $name, 'Title'=> $Title); 
		$win = 'no';
		
		$count = 0;
		foreach($decodedNav as $object) {	
			if($object['Title'] == $Title){
				unset($decodedNav[$count]);
			}
			++$count;
		}
		$navData = json_encode($decodedNav);
		file_put_contents($docRoot.'/admin/settings/navigation.json', $navData);
		
		unlink($docRoot.'/ajax/'.$fileName);
	}
	else { echo 'THESE WALLS SHALL NOT FAULTER'; }
?>


