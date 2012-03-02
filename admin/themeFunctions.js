$(document).ready(function(){

	window.activeEditor = 'False';
	window.settingsExpanded = 'False';
	baseURL = 'http://';
	urlCheck();
	//window.pwEntered = 'False';
	$('.gear').bind('mousedown',function(){settingsControl();});
	
	loadOut('Home');
	$('.homePageLink').bind('mousedown',function(){loadOut('Home');});
	$('.addPageLink').bind('mousedown',function(){loadOut('Add Page');});
	$('.editPageLink').bind('mousedown',function(){loadOut('Edit Page');});
	$('.deletePageLink').bind('mousedown',function(){loadOut('Delete Page');});
	
	$('.barrelRoll').bind('mousedown',function(){barrelRoll();});
	
	$('.maskClose').bind('mousedown',function(){hideMask();});
	$('.maskFill').bind('mousedown',function(){hideMask();});
	
	$('.menuBasicSettings').bind('mousedown',function(){showMask('basicSettings');});
	$('.menuFontSize').bind('mousedown',function(){showMask('fontSizing');});
	$('.stylingMenuItem').bind('mousedown',function(){stylingSubMenu();});
	$('.menuGoBack').bind('mousedown',function(){basicSubMenu();});
	$('.menuLogoUpload').bind('mousedown',function(){showMask('logoUpload');});
	
	$('.basicSettingsContainer .btnDiv').bind('mousedown',function(){submitSettings('basicSettings');});
		
	$.ajaxSetup({ cache: false });
	
	wysiwygLoad();
	
});

function urlCheck(){
	fullURL = document.URL;
	httpStripURL = fullURL.replace(/http:\/\//g,'');
	hasWWW = /[h][t]{2}[p].{3}[w]{3}.*/;
	
	if(fullURL.match(hasWWW)){
		baseURL = 'http://www.';
	}
	
}

function loadOut(current, data){
	setTimeout(function(){wysiwygEnd();}, 400)
	
	/*if(window.pwEntered === 'False') {
		passwordLoadOut();
	}
	else{*/
		if(data === undefined){
			data = 'New';
		}
	
		if(current === 'Home'){
			$('.content').children().addClass('fade');
			setTimeout(function(){$('.content').html('');}, 400);
			setTimeout(function(){homePageLoadOut();}, 600);
		}
		
		if(current === 'Add Page'){
			$('.content').children().addClass('fade');
			setTimeout(function(){$('.content').html('');}, 400);
			setTimeout(function(){addPageLoadOut(data);}, 600);
		}
		
		if(current === 'Edit Page'){
			$('.content').children().addClass('fade');
			setTimeout(function(){$('.content').html('');}, 400);
			setTimeout(function(){editPageLoadOut();}, 600);
		}
		
		if(current === 'Delete Page'){
			$('.content').children().addClass('fade');
			setTimeout(function(){$('.content').html('');}, 400);
			setTimeout(function(){deletePageLoadOut();}, 600);
		}
	/*}*/
}

function passwordLoadOut(){

	$.getJSON('http://'+document.location.hostname+'/admin/settings/config.json', function(data) {
		$.each(data, function(key, val) {
			entry = key;
			Password = val['Password'];
		});
	});
	
	$('.content').html('<div class="pwInputForm transition fade"><h1 class="">Please enter the Admin password</h1><input type="password" class="pwInput"><div class="pwInputBtn">Submit</div></div>');
	setTimeout(function(){$('.content').children().removeClass('fade');}, 100)
	$('.content').css({'height':'120px','width':''});
	
	$('.pwInputBtn').bind('mousedown',function(){pwCheck();});

}

function pwCheck() {
	passAttempt = $('.pwInput').val();
	encodedPassAttempt = btoa(passAttempt);
	if(encodedPassAttempt === Password){
		window.pwEntered = 'True';
		loadOut('Home');
		$('.gear').bind('mousedown',function(){settingsControl();});
	}
	
	if(passAttempt != Password){
		$('.pwInput').val('');
		$('.pwInputForm h1').text('Please try again');
	}
}

function homePageLoadOut() {
	$('.content').html('<h1 class="fade transition">Welcome to the Admin Area</h1>');
	setTimeout(function(){$('.content h1').removeClass('fade');}, 100)
	var childHeight = $('.content').children().outerHeight();
	$('.content').css({'height':childHeight,'width':''});
}

function addPageLoadOut(current) {
	currentPageEdit = current.replace(/[^a-zA-Z0-9]/g,'');
	if(current === 'New') {
		$('.content').html('<form class="fade transition"><label for="Title">Title</label><input id="Title" type="text" class="Title"><br><label for="subTitle">subTitle</label><input id="subTitle" type="text" class="subTitle"><br><label for="Post">Post</label><textarea id="Post" name="Post" class="Post"></textarea><br><div class="btnDiv">Add Page</div></form>');
		wysiwygStart();
		setTimeout(function(){$('.content form').removeClass('fade');}, 400)
		var childHeight = $('.content form').outerHeight();
		var sizeArray = {
		      'height' : '408px',
		      'width' : '800px'
		    }
		$('.content').css(sizeArray);
		$('form .btnDiv').bind('mousedown',function(){addPage();});
	}
	
	if(current != 'New') {
		$.getJSON('http://'+document.location.hostname+'/ajax/'+currentPageEdit+'.json', function(data) {
			$.each(data, function(key, val){
				entry = key;
				Title = window.atob(val['Title']);
				Post = val['Post'];
				decodedPost = window.atob(val['Post']);
				validatedPost = decodedPost.replace(/\+/g,' ');
				subTitle = window.atob(val['Sub-Title']);
				
				$('.content').html('<form class="fade transition"><label for="Title">Title</label><input id="Title" type="text" class="Title" value="'+Title+'"><br><label for="subTitle">subTitle</label><input id="subTitle" type="text" class="subTitle" value="'+subTitle+'"><br><label for="Post">Post</label><textarea id="Post" name="Post" class="Post">'+validatedPost+'</textarea><br><div class="btnDiv">Edit Page</div></form>');
				var sizeArray = {
									'height' : '408px',
									'width' : '800px'
								}
				$('.content').css(sizeArray);
				setTimeout(function(){wysiwygStart();}, 200);
				$('form .btnDiv').bind('mousedown',function(){addPage();});
			});
		}).success(function(){setTimeout(function(){$('.content form').removeClass('fade');}, 400)});
	}
}

function editPageLoadOut() {
	$('.content').html('<h1 class="transition fade">Which page would you like to edit?</h1><ul id="editListUL" class="fade transition"></ul>');
	$.getJSON('http://'+document.location.hostname+'/ajax/navigation.json', function(data) {
		$.each(data, function(key, val) {
			entry = key;
			Title = window.atob(val['Title']);
			pageName = val['pageName'];
			pageNoQuotes = pageName.replace(/'/g,'');
			pageBind = '.'+pageNoQuotes;
			
			
			$('#editListUL').append('<li class="editSelection">'+Title+'</li>');
			$('.editSelection').bind('mousedown',function(){
				data = $(this).text();
				loadOut('Add Page', data);
			});
		
		});
	}, "json").success(function() {var childHeight = $('.content #editListUL').outerHeight() + $('.content h1').outerHeight();
	$('.content').css({'height':childHeight,'width':''}); setTimeout(function(){$('.content').children().removeClass('fade');}, 200)});
}

function deletePageLoadOut() {
	$('.content').html('<h1 class="transition fade">Which page would you like to delete?</h1><ul id="editListUL" class="fade transition"></ul>');
	$.getJSON('http://'+document.location.hostname+'/ajax/navigation.json', function(data) {
		$.each(data, function(key, val) {
			entry = key;
			Title = window.atob(val['Title']);
			pageName = val['pageName'];
			pageNoQuotes = pageName.replace(/'/g,'');
			pageBind = '.'+pageNoQuotes;
			encodedTitle = val['Title'];
			
			$('#editListUL').append('<li class="editSelection">'+Title+'</li>');
			$('.editSelection').bind('mousedown',function(){
				data = $(this).text();
				jsonName = data.replace(/[^a-zA-Z0-9]/g,'');
				progressIndicator();
				$.post('http://'+document.location.hostname+'/ajax/deletePage.php?jsonName='+jsonName+'&Title='+Title+'&encodedTitle='+encodedTitle, "json").success(function() {successIndicator();loadOut('Delete Page');});
			});
		
		});
	}, "json").success(function() {var childHeight = $('.content #editListUL').outerHeight() + $('.content h1').outerHeight();
	$('.content').css({'height':childHeight,'width':''}); setTimeout(function(){$('.content').children().removeClass('fade');}, 400)});
}

function addPage(){
	failTimer('Start');
	progressIndicator();
	tinyMCEContent = tinyMCE.get('Post').getContent();
	//pageName = $('.pageName').val();
	Title = $('.Title').val();
	pageName = Title.replace(/[^a-zA-Z0-9]/g,'');
	subTitle = btoa($('.subTitle').val());
	pageContent = $('.Post').val();
	encodedTitle = btoa(Title);
	
	//findCheckStart = tinyMCEContent.replace('/(<p>){0,1}([checklist]){1}(</p>){0,1}/g', '<div class="checkmarkContainer">');
	//findCheckEnd = findCheckStart.replace('/.{1}/{1}checklist{1}.{1}(</p>){0,1}/g', '</div>');
	
	findCheckStart = tinyMCEContent.replace('<p>[checklist]</p>', '<div class="checkListContainer">');
	findCheckEndP1 = findCheckStart.replace('<div>[/checklist]</div>', '</div>');
	findCheckEndP2 = findCheckEndP1.replace('<p>[/checklist]</p>', '</div>');
	
	encodedContent = btoa(findCheckEndP2);
	cleanedContent = encodedContent.replace(/ /g, '+');
	//Working on getting [checkmark] box to work right. Check back in the morning
	
	results = 'pageName='+pageName+'&Title='+encodedTitle+'&subTitle='+subTitle+'&pageContent='+cleanedContent;
	postURL = 'http://'+document.location.hostname+'/ajax/postPage.php?'+results;
	$.post('http://'+document.location.hostname+'/ajax/postPage.php?'+results, "json").success(function() {successIndicator();loadOut('Add Page');});
	wysiwygEnd();
}

function heightAdjustment() {
	var containerHeight = $('.content').children().outerHeight();
	alert(containerHeight);
}

function progressIndicator() {
	failTimer('Success');
	
	$('.statusContainer').removeClass('fade');
	$('.progress').removeClass('fade');
}

function successIndicator() {
	$('.progress').addClass('fade');
	$('.success').removeClass('fade');
	failTimer('Success');
	setTimeout(function(){$('.statusContainer').addClass('fade');$('.success').addClass('fade');}, 3000);
}

function failureIndicator() {
	$('.progress').addClass('fade');
	$('.failure').removeClass('fade');
	setTimeout(function(){$('.statusContainer').addClass('fade');$('.failure').addClass('fade');}, 3000);
}

function failTimer(current){
	fail = setTimeout(function(){failureIndicator();}, 10000)
	if(current === 'Success'){
		clearTimeout(fail);
	}
}

function settingsControl(){
	if(window.settingsExpanded === 'False'){
		setTimeout(function(){settingsExpand();}, 20);
	}
	
	if(window.settingsExpanded === 'True'){
		setTimeout(function(){settingsMinimize();}, 20);
	}
}

function settingsExpand(){
	$('.gear').removeClass('gearRotateIn').addClass('gearRotateOut');
	$('.settings').addClass('settingsExpanded');
	window.settingsExpanded = 'True';
	return null;
}

function settingsMinimize(){
	$('.gear').removeClass('gearRotateOut').addClass('gearRotateIn');
	$('.settings').removeClass('settingsExpanded');
	window.settingsExpanded = 'False';
	return null;
}

/*
// look for any "\n" occurences
//var matches = pageContent.match(/\n/g);
doubleEnter = pageContent.replace(/\n\n|\n\n\n|\n\n\n\n/g,'</p><p>');
singleEnter = doubleEnter.replace(/\n/g,'<br>');
*/

/* TinyMCE Customization */
// Create a new plugin class
tinymce.create('tinymce.plugins.ShibuiGalleryManager', {
    init : function(ed, url) {
        // Register an example button
        ed.addButton('GalleryManager', {
            title : 'Gallery Manager',
            onclick : function() { 
				//showMask('imageUpload');
	            popWin('galleryManager', 500, 400);     
            },
            'class' : 'bold' // Use the bold icon from the theme
        });
    }
});

// Register plugin with a short name
tinymce.PluginManager.add('GalleryManager', tinymce.plugins.ShibuiGalleryManager);

function wysiwygLoad(){ 
	tinyMCE.init({
        theme : "advanced",theme_advanced_toolbar_location : "top", mode : "textareas", width: 702,
        plugins: "preview, GalleryManager",
        mode: "none",
        theme_advanced_buttons1 : "fontselect,fontsizeselect,,formatselect,|,bold,italic,underline,strikethrough,|,forecolor,backcolor,forecolorpicker,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,outdent,indent,hr",
        theme_advanced_buttons2 : "cut,copy,paste,undo,redo,|,link,unlink,GalleryManager,cleanup,code,visualaid,anchor,newsdocument,preview",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_align : "left",
        plugin_preview_width: "1024px",
        plugin_preview_height: "720px"
	});
}

function SGMAddImage(current){
	currentImage = current;
	tinyMCE.execCommand('mceInsertContent', false, '<img src="'+currentImage+'" />');
}

function wysiwygStart(){
	if(tinymce.editors.length > 1){
		tinyMCE.execCommand('mceRemoveControl', false, 'Post');
	}
	if(tinymce.editors.length > 0){
		tinyMCE.execCommand('mceRemoveControl', false, 'Post');
	}
	tinyMCE.execCommand('mceAddControl', false, 'Post');
}

function wysiwygEnd(){
	if(tinymce.editors.length > 0){
		tinyMCE.execCommand('mceRemoveControl', false, 'Post');
	}
}

function barrelRoll(){
	$('.wrap').addClass('barrelRoll');
	setTimeout(function(){$('.wrap').removeClass('barrelRoll');}, 1400)
}

function showMask(current){
	configType = current;
	$('.mask').addClass('activeMask');
	$('.'+current+'Container').removeClass('hiddenContainer');

	fillMaskContainer(configType);

}
/*
function fillMaskContainer(current){
	//GET
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

function submitSettings(current){
	//POST
	progressIndicator();
	configType = current;
	if(configType === 'basicSettings'){
		companyName = $('.companyNameInput').val() 
		phoneNumber = $('.phoneNumberInput').val() 
		city = $('.cityInput').val() 
		state = $('.stateInput').val() 
		
		results = 'configType='+configType+'&companyName='+companyName+'&phoneNumber='+phoneNumber+'&city='+city+'&state='+state;
		$.post('http://'+document.location.hostname+'/admin/settings/settingsManager.php?'+results, "json").success(function() {successIndicator(); hideMask();});
	}
}

*/

function fillMaskContainer(configType){
	//GET
	$.getJSON('http://'+document.location.hostname+'/admin/settings/'+configType+'.json', function(data) {
		$.each(data, function(key, val) {
			$('#'+configType+' input[name="'+key+'"]').val(val);	
		});
	});
}

function submitSettings(configType){
	//POST
	progressIndicator();
	
	var data = {};
	
	var formInputText = $('#'+configType+' input[type="text"]').each(function(){data[$(this).attr('name')]=$(this).val();});
	//test for checkbox
	var formCheckbox = $('#'+configType+' input[type="checkbox"').each(function(){data[$(this).attr('name')]=$(this).checked;});
	
	//var formTextArea = $('.'+name+'Wrap input').each(function(){data[$(this).attr('name')]=$(this).val();});
	//var formSelect = $('.'+name+'Wrap input').each();
	$.post('http://'+document.location.hostname+'/admin/settings/settingsManager.php?configType='+configType, data).success(function() {successIndicator(); hideMask();});
	
	//$.post('http://'+document.location.hostname+'/admin/settings/settingsManager.php?', data, "json").success(function() {successIndicator(); hideMask();});
}


function hideMask(){
	$('.maskContainer').addClass('hiddenContainer');
	setTimeout(function(){$('.mask').removeClass('activeMask');$('.popWin').html('');}, 400);
}

function stylingSubMenu(){
	$('.menuPage').removeClass('activeMenu');
	setTimeout(function(){$('.menuStyling').addClass('activeMenu');}, 440);
}

function basicSubMenu(){
	$('.menuPage').removeClass('activeMenu');
	setTimeout(function(){$('.menuBasic').addClass('activeMenu');}, 440);
}

function popWin(current, height, width){
	
	maskWidth = width + 46;
	maskHeight = height + 46;
	
	$('.maskInnerWrap').css({
		width: maskWidth,
		height: maskHeight
	});
	
	
	if(height != 'auto'){
		height = height+'px';
	}
	
	if(width != 'auto'){
		width = width+'px';
	}
	
	if(height === null || height === undefined){
		height = '340px';
	}
	if (width === null || width === undefined) {
		width = '410px';
	}

	$.ajax({
	url:"plugins/"+current+"/edit.php",
		data: "",
		type:  "GET",
		statusCode: {
		404: function() {
				alert('page not found');
			}
		},
		success: function(obj) {
			$('.popWin').html('<div class="maskClose"><p>x</p></div>\n'+obj).removeClass('hiddenContainer');
			$('.mask').addClass('activeMask');
			//$('.popWin').html('<div class="maskClose"><p>x</p></div>\n<iframe src="plugins/'+current+'/index.php" height="'+height+'px" width="'+width+'px"></iframe>').removeClass('hiddenContainer');
			$('.maskClose').bind('mousedown',function(){hideMask();});
		}
	});
	
}