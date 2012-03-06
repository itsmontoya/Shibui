<?php
	
	function load($json){
		global $dataArray, $viewArray, $docRoot;
		
		if($dataArray[$json] != null) return;
		$path = $docRoot.'/admin/settings/'.$json.'.json';
		$viewPath = $docRoot.'/admin/plugins/'.$json.'/view.php';
		if (file_exists($path)){
			$pull = file_get_contents($path);	
			$decodePull = json_decode($pull, true);
			$dataArray[$json] = $decodePull;
		}
		if(file_exists($viewPath)) $viewArray[$json] = $viewPath;
	}
	
	function render($configType, $view=null, $map=null){
		global $dataArray, $viewArray, $docRoot;
		if(isset($map)) load($map);
		load($configType);
		if(isset($view)) include($docRoot.'/admin/plugins/'.$configType.'/'.$view.'.php');
		else include ($viewArray[$configType]);

	}
	
	function loadTheme($data){
		global $docRoot;
		include($docRoot.'/themes/'.$data.'/index.php');
	}

	function region($region){
		global $dataArray, $docRoot;
		load($dataArray['head']['Theme_Name']);
		$data = $dataArray[$dataArray['head']['Theme_Name']];
		$regionArray = $data[$region];
		foreach ($regionArray as $region){
			render($region['data'], $region['view'], $region['map']);
		}		
	}
?>