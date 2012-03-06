$(document).ready(function(){
	$.ajaxSetup({ cache: false });
	$('#navUL a').removeAttr("href");
});


function loadOut(current){

$('.content').addClass('fade');
$('#navUL li').removeClass('active');
setTimeout(function(){$('.content').html('');}, 400);
setTimeout(function(){contentPull(current);}, 600);
refreshFunction(current);
}

function contentPull(current) {
console.log(current);
	$.getJSON('http://'+document.location.hostname+'/ajax/'+current+'.json', function(data) {
		console.log(data);
		Title = data['Title'];
		pageContent = data['pageContent'];
		console.log(pageContent);
		cleanedPost = pageContent.replace(/<p><\/p>/g,'');
		$('.content').append('<div class="page transition">'+cleanedPost+'</div><div class="widgetContainer transition"><form><h2>Get Your</h2><h1>FREE</h1><h2>Estimate!</h2><label for="name">Name:</label><input type="text" name="name"><label for="phone">Phone:</label><input type="text" name="phone"><label for="email">Email:</label><input type="text" name="email"><div class="formSubmit"><p>Contact Us<p></div><small>Your information is confidential</small></form><div class="associations"><h2>Our Associations &amp; Accreditations</h2></div></div>');
		$('.'+current+'Li').addClass('active');
		var childHeight = $('.content').children().outerHeight();
		$('.content').css('height',childHeight);
	}, "json").success(function() {setTimeout(function(){$('.content').removeClass('fade');}, 40)});
}

function heightAdjustment() {
	var containerHeight = $('.content').children().outerHeight();
	alert(containerHeight);
}

function navLoad(){
	$.getJSON('http://'+document.location.hostname+'/admin/settings/navigation.json', function(data) {
		$.each(data, function(key, val) {
			entry = key;
			Title = window.atob(val['Title']);
			pageName = val['pageName'];
			stripApos = pageName.replace(/'/g, '');
			if(pageName != 'Home'){
				$('#navUL').append('<li class="'+stripApos+'Li"><a onClick="loadOut('+pageName+')">'+Title+'</a></li>');
			}
			var childHeight = $('.content').children().outerHeight();
			$('.content').css('height',childHeight);
		});
	}, "json").success(function() {setTimeout(function(){$('.content div').removeClass('fade');}, 40)});
}

function refreshFunction(current){
	currentURL = document.location.href;
	if(current === 'Home') current = '';
	window.history.pushState(null,null,'./'+current);	
}