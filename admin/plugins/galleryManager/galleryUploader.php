<?php

if(!isset($_FILES['imageUpload']))die("I need a file please");
	
$err = $_FILES['imageUpload']['error'];
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$imagePath = $docRoot.'images';
$galleryPath = $docRoot.'images/gallery';

if(!file_exists($imagePath)) mkdir($imagePath);
if(!file_exists($galleryPath)) mkdir($galleryPath);

if($err == UPLOAD_ERR_OK)
{
	//$ext = strtolower(pathinfo($_FILES['imageUpload']['name'], PATHINFO_EXTENSION));
	//$fn = md5($_FILES['imageUpload']['name'] . time());
	//$final_filename = $fn . '.' . $ext;
	$final_filename = str_replace(' ', '', $_FILES['imageUpload']['name']);
	move_uploaded_file($_FILES['imageUpload']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] . '/images/gallery/' . $final_filename);
}

	header("location:".$_SERVER['HTTP REFERER']."/admin/plugins/galleryManager/galleryManager.php?success=success&function=gallery");
	exit(0);

?>