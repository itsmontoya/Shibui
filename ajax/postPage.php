<?php

$name = "'" . $_GET["pageName"] . "'";
$pageName = $_GET["pageName"].= '.json';
$Title = $_GET["Title"];
$subTitle = $_GET["subTitle"];
$pageContent = $_GET["pageContent"];
$updateNav = 'true';

//Content Encryption Validation. If contains spaces, fix. 
$validatedContent = str_replace(' ', '+', $pageContent);


$getNav = file_get_contents('navigation.json');
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
	file_put_contents('navigation.json', $navData);
}

//Post New JSON Page
$postData[] = array('Title'=> $Title, 'Sub-Title'=> $subTitle, 'Post'=> $validatedContent);
$fp = fopen($pageName, 'w');
fwrite($fp, json_encode($postData));
fclose($fp);

?>


