<?php

$pngTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.png';
$jpgTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.jpg';
$gifTemp = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.gif';

if (file_exists($pngTemp)) {
	unlink($pngTemp);
}
else if (file_exists($jpgTemp)) {
	unlink($jpgTemp);
}
else if (file_exists($gifTemp)) {
	unlink($gifTemp);
}

header("location:".$_SERVER['HTTP REFERER']."/admin/settings/logoManager/logoManager.php?success=success");
exit(0);

?>