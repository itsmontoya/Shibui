<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$.ajaxSetup({ cache: false });
	$('.btnDiv').bind('mousedown',function(){parent.submitSettings('basicSettings');self.location.href='refresh.php';});
});


function fillMaskContainer(){
	
	$.getJSON('http://'+document.location.hostname+'/admin/settings/basicSettings.json', function(data) {
		
		$.each(data, function(key, val) {
			entry = key;
			companyName = val['Company Name'];
			phoneNumber = val['Phone Number'];
			city = val['City'];
			state = val['State'];
			
			$('.companyNameInput').val(companyName);
			$('.phoneNumberInput').val(phoneNumber);
			$('.cityInput').val(city);
			$('.stateInput').val(state);
						
		});
	});
}
</script>

</head>
<body onload="fillMaskContainer();">
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
</body>
</html>