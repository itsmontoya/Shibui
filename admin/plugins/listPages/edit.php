<?php
	header('Content-type:application/json');
	$docRoot = $_SERVER['DOCUMENT_ROOT'];
	$directory = $docRoot."ajax/";
	$content = new DirectoryIterator($directory);
	$array = array();
	
	foreach($content as $json)
	{
		if(pathinfo($json,PATHINFO_EXTENSION) == 'json'){
			$pull = file_get_contents($directory.$json);
			$decodePull = json_decode($pull, true);
			if($decodePull["Title"] != null){
				$array[]['Title'] = $decodePull["Title"];
			}
		}
	}
	$json = json_encode($array);
	echo $json
?>