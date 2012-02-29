<?php

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

$pngTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.png';
$jpgTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.jpg';
$gifTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.gif';

if (file_exists($pngTemp)) {
	$current = $pngTemp;
	$ext = '.png';
}
else if (file_exists($jpgTemp)) {
	$current = $jpgTemp;
	$ext = '.jpg';
}
else if (file_exists($gifTemp)) {
	$current = $gifTemp;
	$ext = '.gif';
}

$final_filename = 'logo'.$ext;
copy($current , $_SERVER['DOCUMENT_ROOT'].'/images/'.$final_filename);
unlink($current);

header("location:".$_SERVER['HTTP REFERER']."/admin/plugins/logoManager/logoManager.php?success=success");
exit(0);

?>