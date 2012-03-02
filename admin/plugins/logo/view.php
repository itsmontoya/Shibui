<?php
	global $docRoot, $httpHost;
	
	$pngLogo = $docRoot . '/images/logo.png';
	$jpgLogo = $docRoot . '/images/logo.jpg';
	$gifLogo = $docRoot . '/images/logo.gif';
	
	$pngLogoLoc = 'http://' . $httpHost . '/images/logo.png';
	$jpgLogoLoc = 'http://' . $httpHost . '/images/logo.jpg';
	$gifLogoLoc = 'http://' . $httpHost . '/images/logo.gif';
	
	
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