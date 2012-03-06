<?php
	session_start();
	if($_SESSION['user_name'] != null){
		
		$docRoot = $_SERVER['DOCUMENT_ROOT'];
		$contentRoot = $docRoot.'/ajax/';
		$payload = stripcslashes($_POST['payload']);
		$pageName = json_decode($payload)->pageName.'.json';
			
		$fp = fopen($docRoot.'/ajax/'.$pageName, 'w');
		fwrite($fp, $payload);
		fclose($fp);
	}
	else { echo 'THESE WALLS SHALL NOT FAULTER'; }
?>