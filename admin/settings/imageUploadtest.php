<html>
<head>
<title>uploadtest</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>

<?php 
	if(isset($_GET['success']) && 'success'==$_GET['success']){
		echo '<script type="text/javascript">parent.successIndicator();parent.failIndicator("success");</script>';
	}
?>


<script type="text/javascript">
	
	function enableSubmit(){
		setTimeout(function(){$('#imageUploadSubmit').removeClass('fade');}, 800);
	}
</script>
<style> 
    <!--
    
    body {
    	font-family: 'Open Sans', sans-serif; color: #fff; 
    	margin: 0;
    }
    
    .wrap {
    	width: 406px;
    	overflow: hidden;
    }
    
	h2 {
		margin: 12px 0 4px 0;
	}
	
	h3 {
		margin: 12px 0 0 0;
	}
	
	img {
		max-height: 150px;
		display: block;
		margin: 0 0 8px 0;
	}
	
	input[type="file"] {
		font-size: 1.2em;
	}
	
	input[type="image"] {
		font-size: 1.2em;
		background: transparent;
		border: none;
	}
		
	.btnDiv:hover {
		background: #292929;
	}
	
	br {
		clear: both;
	}

	.fileBtnContainer {
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
	}
	
	input[type="submit"] {
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
	
	.fileBtnContainer:hover, input[type="submit"]:hover {
		background: #292929;
	}
	
	#fileUpload {
		display: block;
		height: 100%;
		cursor: pointer;
	}
	
	.currentImageInfo {
		margin: 0 0 8px 0;
	}
	
	.selectFileText {
		position:absolute;
		padding: 9px;
		border: 3px solid #292929; 
		-webkit-border-radius: 12px;
		-moz-border-radius: 12px;
		border-radius: 12px; 
	}
	
	.transition {
	    -webkit-transition: all .4s linear;
	    -moz-transition: all .4s linear;
	    -o-transition: all .4s linear;
	    -ms-transition: all .4s linear;
	    transition: all .4s linear;
	}
	
	.fade {
	    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	    filter: alpha(opacity=0);
	    -moz-opacity: 0;
	    -khtml-opacity: 0;
	    opacity: 0;
	}
	
    -->
   </style>
</head>
<body>
	<div class="wrap">
		<h2>Current Logo</h2>
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
		<form name="imageUpload" method="POST" action="imageUploader.php" enctype="multipart/form-data">
			
			<div class="fileBtnContainer">
				<div class="selectFileText">Select a file</div>
				<input id="fileUpload" type="file" size="20" name="imageUpload" style='opacity:0; z-index:2;' onchange='$("#fileMask").html($(this).val()); enableSubmit();' />
			</div>
			
			<input id="imageUploadSubmit" type="submit" class="fade transition" name="imageUploadSubmit" onClick="parent.progressIndicator(); parent.failTimer('Start');">
		</form>
		<br>
		<div class="currentImageInfo">
			<h3>Selected Image Name</h3>
			<span id='fileMask'>Please select a file</span>
		</div>
	</div>
</body>
</html>