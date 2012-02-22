<?php

if(!isset($_FILES['imageUpload']))
	die("I need a file please");
	
$err = $_FILES['imageUpload']['error'];

if($err == UPLOAD_ERR_OK)
{
	$pngTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/logo.png';
	$jpgTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/logo.jpg';
	$gifTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/logo.gif';
	
	if (file_exists($pngTemp)) {
		unlink($pngTemp);
	}
	else if (file_exists($jpgTemp)) {
		unlink($jpgTemp);
	}
	else if (file_exists($gifTemp)) {
		unlink($gifTemp);
	}
	
		
	$ext = strtolower(pathinfo($_FILES['imageUpload']['name'], PATHINFO_EXTENSION));
	$fn = md5($_FILES['imageUpload']['name'] . time());
	$final_filename = 'logo.' . $ext;
	move_uploaded_file($_FILES['imageUpload']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.' . $ext);
	
	/*
	$pngLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/logo.png';
	$jpgLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/logo.jpg';
	$gifLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/logo.gif';
	
	if (file_exists($pngLogo)) {
		unlink($pngLogo);
	}
	else if (file_exists($jpgLogo)) {
		unlink($jpgLogo);
	}
	else if (file_exists($gifLogo)) {
		unlink($gifLogo);
	}
	
	$ext = strtolower(pathinfo($_FILES['imageUpload']['name'], PATHINFO_EXTENSION));
	move_uploaded_file($_FILES['imageUpload']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] . '/images/' . $final_filename);
	*/
}

	header("location:http://dev.itsmontoya.com/admin/settings/uploadConfirmation.php?success=success");
	exit(0);



?>