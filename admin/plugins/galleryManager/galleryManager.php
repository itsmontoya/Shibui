<?php include('header.php'); ?>

<body>
	<div class="wrap">
		<?php 
			if(isset($_GET['function']) && 'gallery'==$_GET['function']) { ?>
				<script type="text/javascript">$('.galleryManagerMenu').children().removeClass('active');$('.galleryLink').addClass('active');</script>
				<h2 class="galleryDisplayHeader">Gallery</h2>
				
				<div class="navigation">
					<ul class="galleryManagerMenu">
						<li><a class="galleryLink" href="galleryManager.php?function=gallery">Gallery</a></li>
						<li><a class="uploadLink" href="galleryManager.php?function=upload">Image Upload</a></li>
					</ul>
				</div>
				
				<?php $directory = $_SERVER['DOCUMENT_ROOT']."/images/gallery/";
				//$images = glob($directory . "*.png");
				$images = new DirectoryIterator($directory);
				foreach($images as $image)
				{
					
					if(preg_match('#^(.+?)(_t)?\.(jpg|gif|png)#i', $image)){
						$newImage = preg_replace('%(.)*(/)%', '', $image);
						$newImageURL = 'http://'.$_SERVER['SERVER_NAME'].'/images/gallery/'.$newImage;
						echo '<div class="galleryDisplay"><img src="'.$newImageURL.'" /><div class="inputMask addInputMask"></div><div class="inputMask delInputMask"></div><input type="button" class="transition addBtn" value="Add" onclick="parent.SGMAddImage(\''.$newImageURL.'\');parent.hideMask();self.location.href=\'clearGM.php\'"/><input type="button" class="transition delBtn" value="Del" onclick="parent.hideMask();self.location.href=\'deleteGalleryImage.php?image='.$newImage.'\'"/></div>' ;
					}
				}
			}
			else if(isset($_GET['function']) && 'upload'==$_GET['function']) { ?>
					<script type="text/javascript">$('.uploadLink').addClass('active');$('.galleryManagerMenu').children().removeClass('active');</script>
					<h2>Image Upload</h2>
					
					<div class="navigation">
						<ul class="galleryManagerMenu">
							<li><a class="galleryLink" href="galleryManager.php?function=gallery">Gallery</a></li>
							<li><a class="uploadLink" href="galleryManager.php?function=upload">Image Upload</a></li>
						</ul>
					</div>
				
					<form name="imageUpload" method="POST" action="galleryUploader.php" enctype="multipart/form-data">
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
			<?php } ?>
			
	</div>
</body>
</html>