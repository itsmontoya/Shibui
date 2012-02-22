<?php 

$pngLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/logo.png';
$jpgLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/logo.jpg';
$gifLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/logo.gif';

$pngLogoLoc = 'http://' . $_SERVER['HTTP_HOST'] . '/images/logo.png';
$jpgLogoLoc = 'http://' . $_SERVER['HTTP_HOST'] . '/images/logo.jpg';
$gifLogoLoc = 'http://' . $_SERVER['HTTP_HOST'] . '/images/logo.gif';


if (file_exists($pngLogo)) {
	echo '<img src="'.$pngLogoLoc.'" alt="Logo">';
}
else if (file_exists($jpgLogo)) {
	echo '<img src="'.$jpgLogoLoc.'" alt="Logo">';
}
else if (file_exists($gifLogo)) {
	echo '<img src="'.$gifLogoLoc.'" alt="Logo">';
}
else {
	echo 'No logo uploaded';
}
 ?>