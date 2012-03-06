<?php 
	global $page, $docRoot;
	$pagePath =  $docRoot.'/ajax/'.$page.'.json';
	
	if(file_exists($pagePath)) {	
		$getContent = file_get_contents($pagePath);
		$decodedContent = json_decode($getContent,true);
		//print_r($decodedContent);
		echo $decodedContent['pageContent'];
	}
	else {echo "<h1>404</h1><p>I'm sorry, but there is no page at this address</p>";}
?>