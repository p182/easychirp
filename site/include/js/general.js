/* GLOBAL VARS *************/
var modalOpen = false;
var txtAlertSureDelete = $("#main").attr("data-sure-delete"); //"Are you sure you want to delete...";

/* Show/hide option buttons *************/
$(".btnOptions > h3 > a").attr("aria-expanded",false); // set default
$(".btnOptions > h3 > a").click(function(e) {
	e.preventDefault();

    // set vars
    var obj = $(this).parent().next();
	var isDisplayed = obj.hasClass('displayOptions');

	// first close both sections
    $(".btnOptions ul").removeClass('displayOptions');
	$(".btnOptions > h3 > a").attr("aria-expanded",false);

	// open section clicked
	if (isDisplayed===false) {
		obj.addClass('displayOptions');
		$(this).attr("aria-expanded",true);
	}
});
// Add role of button
// Add spacebar support
$(".btnOptions > h3 > a").attr("role","button").keydown(function(e) {
	if(e.keyCode == 32){ // spacebar
		e.preventDefault();
		$(this).trigger("click");
	}
});

// Add aria-controls pointing to associated element
$(".btnOptions > h3 > a").each(function () {
	var x = $(this).attr('href').split(/#/)[1];
	$(this).attr("aria-controls", x);
});

/* Show/hide write tweet *************/
$("#enterTweet h2 a").click(function(e) {
	e.preventDefault();
	var obj = $("#enterTweetContent");
	var isDisplayed = obj.hasClass('displayEnterTweet');
	if (isDisplayed===false) {
		obj.addClass('displayEnterTweet');
		$(this).attr("aria-expanded",true);
		$("#txtEnterTweet").focus();
	}
	else {
		obj.removeClass('displayEnterTweet');
		$(this).attr("aria-expanded",false);
	}
});
$("#enterTweet h2 a").attr("role","button").attr("aria-expanded",false);
$("#enterTweet h2 a").keydown(function(e) {
	if(e.keyCode == 32){ // spacebar
		e.preventDefault();
		$("#enterTweet h2 a").trigger("click");
	}
});

/* Show/hide image descriptions *************/
// the following is duplicated in ajax.js
$(".tweet .btnSecondary").attr("aria-expanded", "false")
.click(function(e) {
	e.preventDefault();

	// set vars
    var objDesc = $(this).next(".imageDesc");
    var isDisplayed = $(objDesc).is(":visible");

	if (isDisplayed===false) {
		$(objDesc).css("display","block");
		$(this).attr("aria-expanded",true);
	}
	else {
		$(objDesc).css("display","none");
		$(this).attr("aria-expanded",false);
	}
});

/* Tooltip *************/
$(function () {
	$('a[title]').tooltip({
		delay: { "show": 1000, "hide": 100 }
	});
})

/* Character counter *************/
// Update the count
var charCntNum = $('#displayCharCountNumber');
function updateCharCount(charCountField) {
	// Continue if exists on page
	if(!document.getElementById(charCountField)) { return; }
	
	// Calculate number of characters entered
	theField = document.getElementById(charCountField);
	currentCount = 280 - theField.value.length;
	
	// Update number
	charCntNum.html(currentCount);
	
	// Apply style according to character count
	if (currentCount<0) {
		charCntNum.addClass("alert");
	}
	else {
		charCntNum.removeClass("alert");
	}
}
// Initialize char counter widget
(function(){
	var charCountField = "txtEnterTweet";
	
	// Modify default text
	$('#displayCharCountMessage').html($("#enterTweetContent").attr("data-char-remain")+' ');

	// Continue if exists on page
	if(!document.getElementById(charCountField)) { return; }

	// Set initial value and variables
	updateCharCount(charCountField);

	// Event listener
	theField.onkeyup = function() {
		updateCharCount(charCountField);
	}
})();

/*** show Add Image content in Write Tweet area *************/

// Create link to show content
var txtAddImage = {};
txtAddImage.addImage = $("#frmTweetImage").attr("data-add-image");
$('<p id="showAddImage"><a href="#" id="showAddImageAnchor" role="button">' + txtAddImage.addImage + ' &#187;<\/a><\/p>').insertBefore('#frmTweetImage');

//hide create list form
$('#frmTweetImage').hide();

// Behavior to show the Add Image content in Write Tweet area
$('a#showAddImageAnchor').click(function(e) {
	e.preventDefault();
	$('#frmTweetImage').show();
	$('#showAddImage').remove();
	$("#imagePath").focus();
});
//Add spacebar support
$("a#showAddImageAnchor").keydown(function(e) {
	if(e.keyCode == 32){
		e.preventDefault();
		$("a#showAddImageAnchor").trigger("click");
	}
});

/*** show/hide for create list content *************/
//hide create list form
$('#frmCreateList').hide();

// Get open & close text values
var txtList = {};
txtList.Open = $("#createList").attr("data-open");
txtList.Close = $("#createList").attr("data-close");

// Create link to show content
$('<p id="showCreateList"><a href="#" id="showCreateAnchor">' + txtList.Open + ' &#187;<\/a><\/p>').insertBefore('#frmCreateList');

// Behavior to show/hide content
$('#showCreateAnchor').click(function() {
	$('#showCreateList').hide();
	$('#frmCreateList').show();
	
	// Create link to close content
	$('<p id="hideCreateList"><a href="#" id="hideCreateAnchor">&#171; ' + txtList.Close + '<\/a><\/p>').insertAfter('#frmCreateList');
	$('#txt_listName').focus();
	
	// Behavior to hide content
	$('#hideCreateAnchor').click(function() {
		$('#hideCreateList').hide();
		$('#frmCreateList').hide();
		$('#showCreateList').show();
		$('#showCreateAnchor').focus();
		return false;
	});
	return false;
});

// Browser patch for anchor links focus *************/
$("a[href^='#']:not(.close)").click(function() {
	$("#"+$(this).attr("href").slice(1)+"").focus()
});

// Validate tweet entry
$('#frmSubmitTweet').submit(function() {
	var x=$("#txtEnterTweet");
	var y = x.val();
	if (y.length>280) {
		alert($("#frmSubmitTweet").attr("data-error-over"));
		x.focus();
		return false;
	}
	if (y.length==0) {
		alert($("#frmSubmitTweet").attr("data-error-empty"));
		x.focus();
		return false;
	}
});

// Validate DM entry
$('#frmDirectMessage').submit(function() {
	var x=$("#tweep");
	var y = x.val();
	if (y.length==0) {
		alert($("#frmDirectMessage").attr("data-error-tweep-empty"));
		x.focus();
		return false;
	}
	x=$("#txtDirectMessage");
	y = x.val();
	if (y.length>9999) {
		alert($("#frmDirectMessage").attr("data-error-over"));
		x.focus();
		return false;
	}
	if (y.length==0) {
		alert($("#frmDirectMessage").attr("data-error-empty"));
		x.focus();
		return false;
	}
});

/* Modal *************/
// Function to resize and reposition the modal window
function resizeModal(id) {
    // Get the window height and width
    var winH = $(window).height();
    var winW = $(window).width();

    // Position the modal window to center
    $(id).css('top', winH / 2 - $(id).height() / 2 - 35);
    $(id).css('left', winW / 2 - $(id).width() / 2 - 20);
}

// Function to resize mask (grey background)
function resizeMask() {
    // Get the screen height and width
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    // Set height and width to mask to fill up the whole screen
    $('#mask').css('width', maskWidth);
    $('#mask').css('height', maskHeight);
}

// Handle links to modals
$('a[rel=modal]').on('click', function(e) {
	e.preventDefault();
	var id = $(this).attr('href').replace("/","#");
	modalOpen = true;

	// Remember what opened me to focus when closing
	var lastFocus = $(this);

    // Resize the mask
    resizeMask();
	
	// Transition effect - mask
	$('#mask').fadeIn(500);

    // Call function to resize and reposition modal
    resizeModal(id);

	// Position the close button
	var modalLeft = ( $(id).width() + 20 ) + "px";
	$(".close").css('top',  '-.2rem');
	$(".close").css('left', modalLeft);

	// Transition effect and focus the modal
	$(id).fadeIn(500);
	
	// Focus mgmt
	if (id=="#search_quick") {
		$("#query2").focus();
	}
	else if (id=="#go_to_user") {
		$("#goUser").focus();
	}
	else {
		$(id).focus();
	}

	// Close - if close button is clicked
	$('.modal .close').click(function (e) {
		e.preventDefault();
		closeModal();
	});

	// Close - if mask is clicked
	$('#mask').click(function () {
		closeModal();
	});

	// Close - Escape key
	$(document).on('keydown', function (e) {
	    if (e.keyCode === 27) { // ESC
	    	closeModal();
	    }
	});

	// Close it!
	function closeModal() {
		$('#mask, .modal').hide();
		if ( $(lastFocus).parents("#navTweet").length == 1 ) {
			$("#navTweet [href='/tools']").focus();
		}
		else {
			lastFocus.focus();
		}
		modalOpen = false;
	}
});
// Rename id/label in modal to avoid collision on Search page
$(".modal #frmSearch label").attr('for','query2');
$(".modal #frmSearch input").attr('id','query2');

// Resize modal when window resized
$(window).resize(function () {
	var id = $('.modal');

    // Resize the mask
    resizeMask();

    // Call function to resize and reposition modal
    resizeModal(id);

	// Position the close button
	var modalLeft = ( $(id).width() + 20 ) + "px";
	$(".close").css('top',  '-.2rem');
	$(".close").css('left', modalLeft);
});
// Maintain focus within modal
document.addEventListener("focus", function(event) {
	var modal = document.getElementById("search_quick");
	if (modalOpen && !modal.contains(event.target)) {
		event.stopPropagation();
		modal.focus();
	}
	var modal2 = document.getElementById("go_to_user");
	if (modalOpen && !modal2.contains(event.target)) {
		event.stopPropagation();
		modal2.focus();
	}
}, true);
/* End Modal *************/

// Tweet message
$('a[rel=twmess]').click(function(e) {
	if ( $('#enterTweetContent').length == 0 ) {
		return true;
	}
	else {
		e.preventDefault();

		// Open if not open already (this includes focus)
		if (!$('#enterTweetContent').hasClass("displayEnterTweet")) {
			$('#enterTweet h2 a').trigger('click');
		}

		// Focus
		$('#txtEnterTweet').focus();

		// Insert @username in write tweet textarea
		var linkUrl = $(this).attr('href');
		var username = linkUrl.substring( linkUrl.lastIndexOf("/") + 1, linkUrl.length );
		var handle = "@" + username + " ";
		$("#txtEnterTweet").html(handle);

		// Update the char counter
		updateCharCount("txtEnterTweet");
	}
});

// Delete list
$('a[href*="list_delete"]').click(function(e) {
	if (!confirm(txtAlertSureDelete)) {
		return false;
	}
	return true;
});

// Unsubscribe list
$('a[href*="list_unsubscribe"]').click(function(e) {
	if (!confirm(txtAlertSureDelete)) {
		return false;
	}
	return true;
});

// Report spammer
$('a[href*="report_spam"]').click(function(e) {
	var txtAlertSureSpam = $("#main").attr("data-sure-spam"); //"Are you sure you want to report...";
	if (!confirm(txtAlertSureSpam)) {
		 return false;
	}
	return true;
});

// Validate add member to list
$('.frmListAddMember').submit(function(e) {
	var alm_val = $(this).find(":nth-child(3)").val();
	
	if (alm_val=="") {
		alert("Please enter a username to add to the list.");
		$(this).find(":nth-child(3)").focus();
		return false;
	}
	else {
		return true;
	}
});

// If reply or quote tweet then set focus
if ($('#txtEnterTweet').length != 0) {
	var input = {};
	input.obj = $('#txtEnterTweet');
	input.txt = input.obj.val();
	input.first = input.obj.val().substring(0, 1);

	// reply--first character in tweet textarea on page load is "@"
	if (input.first === "@") {
		input.obj.focus();
		input.obj.val('');
		input.obj.val(input.txt);
	}
	// quote tweet--check if param exists
	else if ( $('input[name="quoted_tweet_url"]').length ) {
		input.obj.focus();
	}
}

/* Adobe Mega Menu
 * https://github.com/adobe-accessibility/Accessible-Mega-Menu/
 */
$("#main_menu_wrapper, #tweet_menu_wrapper").accessibleMegaMenu({
	/* prefix for generated unique id attributes (for aria) */
	uuidPrefix: "megamenu",

	/* css class used to define the megamenu styling */
	menuClass: "nav-menu",

	/* css class for a top-level navigation item in the megamenu */
	topNavItemClass: "nav-item",

	/* css class for a megamenu panel */
	panelClass: "sub-nav",

	/* css class for a group of items within a megamenu panel */
	panelGroupClass: "sub-nav-group",

	/* css class for the hover state */
	hoverClass: "hover",

	/* css class for the focus state */
	focusClass: "focus",

	/* css class for the open state */
	openClass: "open"
});

/*
 * jQuery Hotkeys Plugin
 * Copyright 2010, John Resig
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * https://github.com/jeresig/jquery.hotkeys
 */
(function(e){function t(t){if(typeof t.data==="string"){t.data={keys:t.data}}if(!t.data||!t.data.keys||typeof t.data.keys!=="string"){return}var n=t.handler,r=t.data.keys.toLowerCase().split(" "),i=["text","password","number","email","url","range","date","month","week","time","datetime","datetime-local","search","color","tel"];t.handler=function(t){if(this!==t.target&&(/textarea|select/i.test(t.target.nodeName)||e.inArray(t.target.type,i)>-1)){return}var s=e.hotkeys.specialKeys[t.keyCode],o=String.fromCharCode(t.which).toLowerCase(),u="",a={};e.each(["alt","ctrl","meta","shift"],function(e,n){if(t[n+"Key"]&&s!==n){u+=n+"+"}});u=u.replace("alt+ctrl+meta+shift","hyper");if(s){a[u+s]=true}if(o){a[u+o]=true;a[u+e.hotkeys.shiftNums[o]]=true;if(u==="shift+"){a[e.hotkeys.shiftNums[o]]=true}}for(var f=0,l=r.length;f<l;f++){if(a[r[f]]){return n.apply(this,arguments)}}}}e.hotkeys={version:"0.8",specialKeys:{8:"backspace",9:"tab",10:"return",13:"return",16:"shift",17:"ctrl",18:"alt",19:"pause",20:"capslock",27:"esc",32:"space",33:"pageup",34:"pagedown",35:"end",36:"home",37:"left",38:"up",39:"right",40:"down",45:"insert",46:"del",59:";",61:"=",96:"0",97:"1",98:"2",99:"3",100:"4",101:"5",102:"6",103:"7",104:"8",105:"9",106:"*",107:"+",109:"-",110:".",111:"/",112:"f1",113:"f2",114:"f3",115:"f4",116:"f5",117:"f6",118:"f7",119:"f8",120:"f9",121:"f10",122:"f11",123:"f12",144:"numlock",145:"scroll",173:"-",186:";",187:"=",188:",",189:"-",190:".",191:"/",192:"`",219:"[",220:"\\",221:"]",222:"'"},shiftNums:{"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":": ","'":'"',",":"<",".":">","/":"?","\\":"|"}};e.each(["keydown","keyup","keypress"],function(){e.event.special[this]={add:t}})})(this.jQuery)

// pressing "ctrl+/" goes to Search page
$(document).bind('keyup', 'ctrl+/', function() {
	window.location.href = "/search";
});

// pressing ctrl+shft+/ goes to Quick Search modal
$(document).bind('keyup', 'ctrl+shift+/', function() {
	$("a[href='/search_quick']").trigger("click");
});

// pressing ctrl+u goes to Go to User modal
$(document).bind('keyup', 'ctrl+u', function() {
	$("a[href='/go_to_user']").trigger("click");
});

// pressing ctrl+m goes to My Profile
$(document).bind('keyup', 'ctrl+m', function() {
	window.location.href = "/profile";
});

