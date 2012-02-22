<?php
	foreach($decodedNav as $object) {
		$pageName = str_replace("'", "", $object['pageName']);
		$quotedPageName = $object['pageName'];
		$Title = $object['Title'];
		$decodedTitle = base64_decode($Title);
		
		if($pageName == 'Home' && '/' == $_SERVER["REQUEST_URI"]){
			echo '<li class="'.$pageName.'Li active"><a href="'.$pageName.'" onClick="loadOut('.$quotedPageName.')">'.$decodedTitle.'</a></li>';
		}
		else{
			if($pageName == $removeSlash){
				echo '<li class="'.$pageName.'Li active"><a href="'.$pageName.'" onClick="loadOut('.$quotedPageName.')">'.$decodedTitle.'</a></li>';
			}
			else{
			echo '<li class="'.$pageName.'Li"><a href="'.$pageName.'" onClick="loadOut('.$quotedPageName.')">'.$decodedTitle.'</a></li>';
			}
		}
	}
?>