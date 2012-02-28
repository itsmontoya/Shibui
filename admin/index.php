<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>iM - Administration Area</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="/favicon.ico" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://dev.itsmontoya.com/admin/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript" src="http://dev.itsmontoya.com/admin/tiny_mce/jquery.tinymce.js"></script>
	<script src="http://dev.itsmontoya.com/admin/themeFunctions.js"></script>
	
</head>
<body>

	<div class="wrap">
		<?php if($_SESSION['user_name'] != null){ ?>
		<nav>
				<ul>
					<li><a class="homePageLink">Home</a></li>
					<li><a class="addPageLink">Add Page</a></li>
					<li><a class="editPageLink">Edit Page</a></li>
					<li><a class="deletePageLink">Delete Page</a></li>
					<li><a class="logOut" href="http://dev.itsmontoya.com/cookies/logout.php">Log Out</a></li>
					<li><a class="goBack" href="http://dev.itsmontoya.com">Go Back to Website</a></li>
				</ul>
			
			</nav>
		
			<section class="content easeTransition">
			
			</section>
			
			<div class="settingsPullOut">
				<div class="gear"></div>
				
				<div class="settings slowTransition">
					
					<div class="menuPage menuBasic transition activeMenu">
						<h2>Settings</h2>
						<ul>
							<li class="menuBasicSettings">Basic Information</li>
							<li class="stylingMenuItem">Styling</li>
							<li class="menuLogoUpload">Logo</li>
							<li>SEO Config</li>
							<li>Add-ons</li>
						</ul>
					</div>
					
					<div class="menuPage menuStyling transition">
						<h2>Styling</h2>
						<ul>
							<li class="menuFontSize">Font Sizing</li>
							<li>Colors</li>
							<li>Font Family</li>
							<li class="menuGoBack">&lt;&lt; Go Back</li>
						</ul>
					</div>
				</div>
			
			</div>	
			<?php }else{ ?>
			<div class="loginContainer">
				<form method="post" action="http://dev.itsmontoya.com/cookies/dbfetch.php">
					<h2>Please login to access the Administration area</h2>
					<label for="Username">Username</label>
					</input><input name="User" type="text">
					<br>
					<label for="Password">Password</label>
					</input><input name="Password" type="password">
					<button type="submit">Log In</button>
				</form>
			</div>
			<?php } ?>
		
	</div>
	<div class="mask">
		<div class="maskInnerWrap">	
			<div class="maskContainer basicSettingsContainer hiddenContainer transition">
				<div class="maskClose"><p>x</p></div>
				<form enctype="multipart/form-data">
					<h2>Basic Settings</h2>
					<label for="companyName">Company Name</label>
					<input type="text" name="companyName" class="companyNameInput">
					<label for="phoneNumber">Phone Number</label>
					<input type="text" name="phoneNumber" class="phoneNumberInput">
					<label for="city">City</label>
					<input type="text" name="city" class="cityInput">
					<label for="state">State</label>
					<input type="text" name="state" class="stateInput">
					<div class="btnDiv">Save</div>
				</form>
			</div>
			
			<div class="maskContainer fontSizingContainer hiddenContainer transition">
				<div class="maskClose"><p>x</p></div>
				<form name="imageUpload" method="POST" action="">
					<h2>Font Sizing</h2>
					<label for="headerOne">Header One</label>
					<input type="text" name="headerOne">
					<label for="headerRest">Headers Two - Six</label>
					<input type="text" name="headerRest">
					<label for="paragraph">Paragraph</label>
					<input type="text" name="paragraph">
					<div class="btnDiv">Save</div>
				</form>
			</div>
			
			<div class="maskContainer logoUploadContainer hiddenContainer transition">
				<div class="maskClose"><p>x</p></div>
				<iframe src="settings/logoManager/logoManager.php" height="340px" width="410px"></iframe>
			</div>
			
			<div class="maskContainer imageUploadContainer hiddenContainer transition">
				<div class="maskClose"><p>x</p></div>
				<iframe src="settings/galleryManager/galleryManager.php?function=upload" height="340px" width="410px"></iframe>
			</div>
			
			<div class="maskContainer colorsContainer hiddenContainer transition">
				<div class="maskClose"><p>x</p></div>
				<form>
					<h2>Basic Settings</h2>
					<label for="companyName">Company Name</label>
					<input type="text" name="companyName">
					<label for="phoneNumber">Phone Number</label>
					<input type="text" name="phoneNumber">
					<label for="city">City</label>
					<input type="text" name="city">
					<label for="state">State</label>
					<input type="text" name="state">
					<label for="logoInput">Logo</label>
					<input type="text" name="logoInput">
					<div class="btnDiv">Save</div>
				</form>
			</div>
		</div>
		<div class="maskFill"></div>
	</div>
	<div class="statusContainer transition fade">
		<div class="progress transition fade">
			<h2>In Progress</h2>
			<div class="outerCircle partialFade">
				<div class="topLeftCorner"></div>
				<div class="topRightCorner"></div>
				<div class="bottomRightCorner"></div>
				<div class="bottomLeftCorner"></div>
				
				<div class="top"></div>
				<div class="right"></div>
				<div class="bottom"></div>
				<div class="left"></div>
				
			</div>
		</div>
		<div class="success transition fade">
			<h2>Success!</h2>
			<div class="outerCircle"><div class="check"></div></div>
		</div>
		<div class="failure transition fade">
			<h2>Failure :(</h2>
			<div class="outerCircle"><p>X</p></div>
		</div>
	</div>
</body>
</html>