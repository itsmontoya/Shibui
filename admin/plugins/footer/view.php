<?php global $dataArray; $data = $dataArray['siteInfo'];?>

<ul>
	<li>&copy;2012 <?php echo $data['Company_Name']; ?></li>
	<li><?php echo $data['City'].', '.$data['State']; ?></li>
	<li><?php echo $data['Phone_Number']; ?></li>
</ul>