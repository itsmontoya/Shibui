<?php
$docRoot = getenv("DOCUMENT_ROOT");

$getConfig = file_get_contents($docRoot.'/admin/settings/config.json');
$decodedConfig = json_decode($getConfig,true);

$getNav = file_get_contents($docRoot.'/ajax/navigation.json');
$decodedNav = json_decode($getNav,true);

/*
$getContent = file_get_contents($docRoot.'/newDev/admin/settings/.json');
$decodedContent = ;
*/

//$currentPage = substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1);
$currentPage = $_SERVER["REQUEST_URI"];
$preg = '~[.][php]{0,3}~';

//$match = preg_match($preg, $currentPage);
//echo $match;



if (preg_match($preg, $currentPage) or $currentPage == '/') 
{
	$getContent = file_get_contents($docRoot.'/ajax/Home.json');
	$decodedContent = json_decode($getContent,true);
	foreach($decodedContent as $object) 
	{
		$pageContent = $object['Post'];
	}
}
else
{
	$match = 'false';
	foreach($decodedNav as $object)
		{
		$pageName = str_replace("'", "", $object['pageName']);
		$Title = $object['Title'];
		$removeSlash = str_replace("/","",$currentPage);
		
		if($pageName == $removeSlash)
			{
			$getContent = file_get_contents($docRoot.'/ajax/'.$pageName.'.json');
			$decodedContent = json_decode($getContent,true);
			
			foreach($decodedContent as $object) 
				{
					$pageContent = $object['Post'];
					$match = 'true';
				}
			}
		}

	if($match == 'false'){
		$fourOhfour = "<h1>404</h1><p>I'm sorry, but there is no page at this address</p>";	
	}
}



$phoneNumber = $decodedConfig['Phone Number'];
foreach($decodedConfig as $object) {	
	//echo $object['Phone Number'];
}

?>