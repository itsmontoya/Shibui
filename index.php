<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>iM</title>
	<link rel="stylesheet" type="text/css" href="http://dev.itsmontoya.com/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="/favicon.ico" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	<script src="http://dev.itsmontoya.com/themeFunctions.js"></script>
	
</head>
<body>
<?php include 'assets/assetConfig.php'; ?>
<?php include 'contentPull.php'; ?>
<?php include($basicHook); ?>
	<div class="wrap">
		<header>
			<?php include($logoHook); ?>
			<div class="CTNInfo">
				<p class="callUs">Call us today!</p>
				<p class="phoneNumber"><?php echo $phoneNumber; ?></p>
			</div>
		</header>
		<nav>
			<ul id="navUL">
				<?php include($navHook); ?>			
			</ul>
		</nav>
		<section class="content easeTransition">
			<div class="page transition">
				<?php include($contentHook); ?>
			</div>
			<div class="widgetContainer transition">
				<?php include($widgetHook); ?>
			</div>
			
		</section>
	</div>
	<footer>
		<div class="footerBar">
			<ul>
				<li>&copy;2012 <?php echo $companyName; ?></li>
				<li><?php echo $city.', '.$state; ?></li>
				<li><?php echo $phoneNumber; ?></li>
			</ul>
		</div>
	</footer>
</body>
</html>