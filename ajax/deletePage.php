<?php
$fileName = $_GET["jsonName"] . ".json";
$Title = $_GET["Title"];
$encodedTitle = $_GET["encodedTitle"];
$getNav = file_get_contents('navigation.json');
$decodedNav = json_decode($getNav,true);
$navTitle = array('pageName'=> $name, 'Title'=> $Title); 
$win = 'no';

$count = 0;
foreach($decodedNav as $object) {	
	if($object['Title'] == $encodedTitle){
		print_r($object);
		unset($decodedNav[$count]);
		print_r($decodedNav);
	}
	++$count;
}

$navData = json_encode($decodedNav);
file_put_contents('navigation.json', $navData);
unlink($fileName);

?>


