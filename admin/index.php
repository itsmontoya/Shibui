<?php 
	session_start(); 
	$docRoot = getenv("HTTP_REFERER");
	$requestURL = 'http://'.getenv("HTTP_HOST");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>iM - Administration Area</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="/favicon.ico" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $requestURL; ?>/admin/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript" src="<?php echo $requestURL; ?>/admin/tiny_mce/jquery.tinymce.js"></script>
	<script src="<?php echo $requestURL; ?>/admin/themeFunctions.js"></script>
	
</head>
<body>
	<!-- <?php $_SERVER['DOCUMENT_ROOT']; ?> -->
	<div class="wrap">
		<?php if($_SESSION['user_name'] != null){ ?>
		<nav>
				<ul>
					<li><a class="homePageLink">Home</a></li>
					<li><a class="addPageLink">Add Page</a></li>
					<li><a class="editPageLink">Edit Page</a></li>
					<li><a class="deletePageLink">Delete Page</a></li>
					<li><a class="logOut" href="<?php echo $requestURL; ?>/cookies/logout.php">Log Out</a></li>
					<li><a class="goBack" href="<?php echo $requestURL; ?>">Go Back to Website</a></li>
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
							<li onclick="popWin('siteInfo', 500, 410);">Basic Information</li>
							<li class="stylingMenuItem">Styling</li>
							<li onclick="popWin('logo', 400, 410);">Logo</li>
							<li onclick="popWin('SEO', 400, 680);">SEO Config</li>
							<li onclick="popWin('navigation', 400, 680);">Navigation</li>
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
				<form method="post" action="<?php echo $requestURL; ?>/cookies/dbfetch.php">
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
			
			<div class="popWin maskContainer hiddenContainer transition">
				<div class="maskClose"><p>x</p></div>
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