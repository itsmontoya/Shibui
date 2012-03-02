<?php 
	include 'assets/load.php';
	
	$page = '';
	$dataArray = array();
	$viewArray = array();
	
	$docRoot = getenv("DOCUMENT_ROOT");
	$httpHost = $_SERVER['HTTP_HOST'];
	$requestURL = 'http://'.getenv("HTTP_HOST");
	$currentPage = $_SERVER["REQUEST_URI"];
	
	$currentPageSplit = split('/', $currentPage);
	$page = $currentPageSplit[1];
	
	if($page == '') $page = 'Home';	
	load('head');
	loadTheme($dataArray['head']['Theme_Name']); 
?>