<!DOCTYPE html>
<html lang="en">
<head>
	<?php render('head'); ?>
</head>
<body>
	<div class="wrap">
		<header>
			<?php region('header'); ?>
		</header>
		<nav>
			<?php render('navigation'); ?>		
		</nav>
		<section class="content easeTransition">
			<div class="page transition">
				<?php render('content'); ?>
			</div>
			<div class="widgetContainer transition">
				<?php region('sidebar'); ?>
			</div>
			
		</section>
	</div>
	<footer>
		<div class="footerBar">
			<?php region('footer'); ?>
		</div>
	</footer>
</body>
</html>