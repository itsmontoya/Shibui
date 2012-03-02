<?php if(isset($_GET['success']) && 'success'==$_GET['success']){echo '<script type="text/javascript">successIndicator();failIndicator("success");</script>';}?>

<script type="text/javascript">
	function enableSubmit(){setTimeout(function(){$('#imageUploadSubmit').removeClass('fade');}, 800);}
</script>
	<style> 
	    <!--
	    
	    .logoManagerWrap {
	    	width: 406px;
	    	overflow: hidden;
	    	color: #fff;
	    }
	    
		.logoManagerWrap h2 {
			margin: 12px 0 4px 0;
		}
		
		.logoManagerWrap h3 {
			margin: 12px 0 0 0;
			font-weight: 600;
		}
		
		.logoManagerWrap img {
			max-height: 150px;
			display: block;
			margin: 0 0 8px 0;
		}
		
		.logoManagerWrap input[type="file"] {
			font-size: 1.2em;
		}
		
		.logoManagerWrap input[type="image"] {
			font-size: 1.2em;
			background: transparent;
			border: none;
		}
		
		.logoManagerWrap  br {
			clear: both;
		}
	
		.logoManagerWrap  .fileBtnContainer {
			height: 50px;
			width: 134px;
			background: #494949;
			color: #fff;
			font-weight: 600;
			font-size: 1.2em;
			-webkit-border-radius: 12px;
			-moz-border-radius: 12px;
			border-radius: 12px; 
			position: relative;
			overflow: hidden;
			margin: 8px 0 0 0;
			float: left;
			cursor: pointer;
		}
		
		.logoManagerWrap .fileBtnContainer:hover .selectFileText {
			background: #292929;
		}
		
		.logoManagerWrap  input[type="submit"] {
			height: 50px;
			width: 130px;
			cursor: pointer;
			background: #494949;
			border: 3px solid #292929;
			color: #fff;
			font-weight: 600;
			font-size: 1.2em;
			padding: 8px;
			-webkit-border-radius: 12px;
			-moz-border-radius: 12px;
			border-radius: 12px; 
			position: relative;
			overflow: hidden;
			margin: 8px 0 0 12px;
			float: left;
		}
		
		.logoManagerWrap input[type="submit"]:hover {
			background: #292929;
		}
		
		.logoManagerWrap  #fileUpload {
			display: block;
			height: 100%;
			cursor: pointer;
		}
		
		.logoManagerWrap  .currentImageInfo {
			margin: 0 0 8px 0;
		}
		
		.logoManagerWrap  .selectFileText {
			position:absolute;
			padding: 9px;
			border: 3px solid #292929; 
			-webkit-border-radius: 12px;
			-moz-border-radius: 12px;
			border-radius: 12px; 
		}
		
		.logoManagerWrap form {
			float: left;
		}
		
	    -->
	   </style>
	   
<div class="logoManagerWrap">	
	<h2>New Logo</h2>
	<?php 
		$pngLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.png';
		$jpgLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.jpg';
		$gifLogo = $_SERVER['DOCUMENT_ROOT'] . '/images/tmp/temp.gif';
		
		$pngLogoLoc = 'http://' . $_SERVER['HTTP_HOST'] . '/images/tmp/temp.png';
		$jpgLogoLoc = 'http://' . $_SERVER['HTTP_HOST'] . '/images/tmp/temp.jpg';
		$gifLogoLoc = 'http://' . $_SERVER['HTTP_HOST'] . '/images/tmp/temp.gif';
		
		
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
	<form name="imageUpload" method="POST" action="replaceConfirmation.php" enctype="multipart/form-data">
		<input id="imageUploadSubmit" type="submit" name="imageUploadSubmit"  value="Save" onClick="parent.progressIndicator(); parent.hideMask(); parent.failTimer('Start');">
	</form>
	<form name="imageCancel" method="POST" action="cancelImageUpload.php">
		<input id="imageUploadCancel" type="submit" name="imageUploadCancel"  value="Cancel" onClick="parent.hideMask();">
	</form>
	<br>
</div>