<?php
	$imageName = $_GET['image'];
	$loc = $_SERVER['DOCUMENT_ROOT'].'/images/gallery/'.$imageName;
	unlink($loc);
	header("location:".$_SERVER['HTTP REFERER']."/admin/plugins/galleryManager/galleryManager.php?success=success&function=gallery");
	exit(0);
?>