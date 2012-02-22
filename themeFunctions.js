$(document).ready(function(){
	//loadOut('Home');
	//navLoad();
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
	$.getJSON('http://dev.itsmontoya.com/ajax/'+current+'.json', function(data) {
		$.each(data, function(key, val) {
			entry = key;
			Title = window.atob(val['Title']);
			Post = val['Post'];
			decodedPost = window.atob(val['Post']);
			//validatedPost = decodedPost.replace(/<\/div><\/p><p>/g,'<\/div><p>');
			validatedPost = decodedPost.replace(/\+/g,' ');
			cleanedPost = validatedPost.replace(/<p><\/p>/g,'');
			$('.content').append('<div class="page transition">'+cleanedPost+'</div><div class="widgetContainer transition"><form><h2>Get Your</h2><h1>FREE</h1><h2>Estimate!</h2><label for="name">Name:</label><input type="text" name="name"><label for="phone">Phone:</label><input type="text" name="phone"><label for="email">Email:</label><input type="text" name="email"><div class="formSubmit"><p>Contact Us<p></div><small>Your information is confidential</small></form><div class="associations"><h2>Our Associations &amp; Accreditations</h2></div></div>');
			$('.'+current+'Li').addClass('active');
			var childHeight = $('.content').children().outerHeight();
			$('.content').css('height',childHeight);
		});
	}, "json").success(function() {setTimeout(function(){$('.content').removeClass('fade');}, 40)});
}

function heightAdjustment() {
	var containerHeight = $('.content').children().outerHeight();
	alert(containerHeight);
}



function navLoad(){
	//$('.content').removeClass('fade');
	$.getJSON('http://dev.itsmontoya.com/ajax/navigation.json', function(data) {
		$.each(data, function(key, val) {
			entry = key;
			Title = window.atob(val['Title']);
			pageName = val['pageName'];
			stripApos = pageName.replace(/'/g, '');
			
			$('#navUL').append('<li class="'+stripApos+'Li"><a onClick="loadOut('+pageName+')">'+Title+'</a></li>');
			
			var childHeight = $('.content').children().outerHeight();
			$('.content').css('height',childHeight);
		});
	}, "json").success(function() {setTimeout(function(){$('.content div').removeClass('fade');}, 40)});
}

function refreshFunction(current){
	currentURL = document.location.href;
	window.history.pushState(null,null,'./'+current);	
	/*if(currentURL === "http://dev.itsmontoya.com/"){
		window.history.pushState(null,null,'index.php/'+current);
	}
	if(currentURL === "http://dev.itsmontoya.com/index.php"){
		window.history.pushState(null,null,'/'+current);
	}
	else {
		window.history.pushState(null,null,'./'+current);
	}
	*/
}