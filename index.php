<?php 
	$docRoot = getenv("DOCUMENT_ROOT");
	$docRoot = rtrim($docRoot, '/');
	include $docRoot.'/assets/load.php';
	$page = '';
	$dataArray = array();
	$viewArray = array();
	
	$httpHost = $_SERVER['HTTP_HOST'];
	$requestURL = 'http://'.getenv("HTTP_HOST");
	$currentPage = $_SERVER["REQUEST_URI"];
	$currentPageSplit = split('/', $currentPage);
	$page = $currentPageSplit[1];
	if($page == '') $page = 'Home';	
	load('head');
	loadTheme($dataArray['head']['Theme_Name']); 
?>