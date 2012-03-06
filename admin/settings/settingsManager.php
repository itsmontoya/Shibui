<?php
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$currentConfigType = $_GET['configType'];
$data = fopen($docRoot.'/admin/settings/'.$currentConfigType.'.json', 'w');
fwrite($data, json_encode($_POST));
fclose($data);
?>