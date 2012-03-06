<?php
	global $dataArray;
	global $page;
	
	$navigation = $dataArray['navigation'];
	$currentPage = pathinfo($_SERVER["REQUEST_URI"], PATHINFO_FILENAME);
	
	if($currentPage == '') $currentPage = $page;
	
	echo '<ul id="navUL">';
		foreach ($navigation as $item){
			if($item['pageName'] != $currentPage){
				echo '<li class="'.$item['pageName'].'Li"><a href="'.$item['pageName'].'" onClick="loadOut(\''.$item['pageName'].'\')">'.$item['Title'].'</a>';
				if(isset($item['subOne'])){
					echo '<ul>';
					foreach ($item['subOne'] as $subItem) {
						echo '<li>';
						echo '<a href="'.$subItem['pageName'].'" onClick="loadOut(\''.$subItem['pageName'].'\')">'.$subItem['Title'].'</a>';
						echo '</li>';
					}
					echo '</ul>';
				}
				echo '</li>';
			}
			else {
				echo '<li class="'.$item['pageName'].'Li active"><a href="'.$item['pageName'].'" onClick="loadOut(\''.$item['pageName'].'\')">'.$item['Title'].'</a>';
				if(isset($item['subOne'])){
					echo '<ul>';
					foreach ($item['subOne'] as $subItem) {
						echo '<li><a href="'.$subItem['pageName'].'" onClick="loadOut(\''.$subItem['pageName'].'\')">'.$subItem['Title'].'</a></li>';
					}
					echo '</ul>';
				}
				echo '</li>';
			}
		}
	echo '</ul>';
?>