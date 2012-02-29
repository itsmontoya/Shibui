<html style="background: #494949;">
<head>
<title>uploadtest</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link href='galleryUpload.css' rel='stylesheet' type='text/css'>
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

<script type="text/javascript">
$(document).ready(function(){
	
	$('.galleryDisplay').bind('mousedown',function(){
		$('.galleryDisplay').removeClass('galleryDisplayActive');
		$(this).addClass('galleryDisplayActive');
	});
	
	function updateNav(current){
		$('.galleryManagerMenu').children().removeClass('active');
		if(current === 'Gallery'){
			$('.galleryManagerMenu').children().removeClass('active');
			$('.galleryLink').addClass('active');
		}
		else if (current === 'Upload') {
			$('.uploadLink').addClass('active');
		
		}
	}

});

</script>
</head>