<?php
	session_start();
	if($_SESSION['user_name'] != null){
		
		print_r($_POST,true);
		
		$docRoot = $_SERVER['DOCUMENT_ROOT'];
		$pageName = $_GET["pageName"].= '.json';
		/*
		//Content Encryption Validation. If contains spaces, fix. 
		$getNav = file_get_contents($docRoot.'/admin/settings/navigation.json');
		$decodedNav = json_decode($getNav);
		$navTitle = array('pageName'=> $name, 'Title'=> $Title); 
		
		foreach($decodedNav as $object) {
			if($object->Title == $Title){
				$updateNav = 'false';
			}
		}
		
		//If the page is new, update Navigation JSON
		if($updateNav == 'true'){
			array_push($decodedNav, $navTitle);
			$navData = json_encode($decodedNav);
			file_put_contents($docRoot.'/admin/settings/navigation.json', $navData);
		}
		*/
		
		//Post New JSON Page
		//$postData[] = array('Title'=> $Title, 'Sub-Title'=> $subTitle, 'Post'=> $validatedContent);
		$fp = fopen($pageName, 'w');
		fwrite($fp, json_encode($_POST));
		fclose($fp);
	}
	else { echo 'THESE WALLS SHALL NOT FAULTER'; }
?>


