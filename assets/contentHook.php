<?php 
	if($pageContent != null){echo base64_decode($pageContent); }
	if($pageContent == null){echo $fourOhfour;}
?>