<?php global $dataArray; $data = $dataArray['contactForm'];?>
<form>
	<h2>Get Your</h2>
	<h1>FREE</h1>
	<h2>Estimate!</h2>
	<label for="name">Name:</label><input type="text" name="name">
	<?php if($data['Show_Phone']){?><label for="phone">Phone:</label><input type="text" name="phone"> <?php } ?>
	<label for="email">Email:</label><input type="text" name="email">
	<div class="formSubmit"><p>Contact Us<p></div>
	<small>Your information is confidential</small>
</form>
<div class="associations"><h2>Our Associations &amp; Accreditations</h2></div>