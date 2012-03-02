<?php
$currentConfigType = $_GET['configType'];
$data = fopen($currentConfigType.'.json', 'w');
fwrite($data, json_encode($_POST));
fclose($data);
?>