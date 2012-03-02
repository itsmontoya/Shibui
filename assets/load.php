<?php
	function load($json){
		global $dataArray, $viewArray;
		if($dataArray[$json] != null) return;
		$path = $_SERVER['DOCUMENT_ROOT'].'/admin/settings/'.$json.'.json';
		if (file_exists($path)){
			$pull = file_get_contents($path);	
			$decodePull = json_decode($pull, true);
			$dataArray[$json] = $decodePull;
		}
		$viewArray[$json] = $_SERVER['DOCUMENT_ROOT'].'/admin/plugins/'.$json.'/view.php';
	}
	
	function render($configType, $view=null){
		global $dataArray;
		global $viewArray;
		
		load($configType);		
		if(isset($view)) include($_SERVER['DOCUMENT_ROOT'].'/admin/plugins/'.$configType.'/'.$view.'.php');
		else include ($viewArray[$configType]);	
	}
	
	function loadTheme($data){
		include($_SERVER['DOCUMENT_ROOT'].'/themes/'.$data.'/index.php');
	}

	function region($region){
		global $dataArray;
		load($dataArray['head']['Theme_Name']);
		$data = $dataArray[$dataArray['head']['Theme_Name']];
		$regionArray = $data[$region];
		foreach ($regionArray as $region){
			render($region['data'], $region['view']);
		}		
	}
?>