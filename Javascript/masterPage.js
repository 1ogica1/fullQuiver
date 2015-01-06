/*
-------------------
Title: masterPage.js
Version: 2.0
Date: 11/21/2014
-------------------
*/

$(document).ready(function () { 
		var vars = [], hash; //Used to get query string items.
		var q = document.URL.split('?')[1];
		if (q != undefined) {
			q = q.split('&');
			for(var i = 0; i < q.length; i++){
				hash = q[i].split('=');
				vars.push(hash[1]);
				vars[hash[0]] = hash[1];
			}
	}

	$('.bxslider').bxSlider({
		adaptiveHeight: false,
		mode: 'horizontal',
		pager: true,
		auto: true
	});
	
	

	$("#loginDialog").dialog({ //Enables the dialog box that is used to log in.
		autoOpen: false,
		position: {of: window, my:"center center", at:"center center"},
		modal: true,
		draggable: false,
		resizable: false,
		width: 500,
		height: 650
	});
	
	$("#signUpDialog").dialog({ //Enables the dialog box that is used for creating a new account.
		autoOpen: false,
		position: {of: window, my:"center center", at:"center center"},
		modal: true,
		draggable: false,
		resizable: false,
		width: 500,
		height: 650
	});
	
	$("#signedInDialog").dialog({ //Enables the dialog box that is used to tell the user they logged in correctly.
		autoOpen: false,
		position: {of: window, my:"center center", at:"center center"},
		modal: true,
		draggable: false,
		resizable: false,
		width: 400,
		buttons: {
			"Stay Here": function () {
				$(this).dialog('close');
			},
			"Go To Account": function () {
				window.location.replace('userAccount.php');
			}
		}	
	});
	
	$('#failLogInDialog').dialog({
		autoOpen: false,
		position: {of: window, my:"center center", at:"center center"},
		modal: true,
		draggable: false,
		resizable: false,
		width: 400,
		buttons: {
			"Cancel": function () {
				$(this).dialog('close');
			},
			"Try Again": function () {
				$("#failLogInDialog").dialog("close");
				$("#loginDialog").dialog("open");
			}
		}	
	});
	
	$('#failRegisterDialog').dialog({
		autoOpen: false,
		position: {of: window, my:"center center", at:"center center"},
		modal: true,
		draggable: false,
		resizable: false,
		width: 400,
		buttons: {
			"Cancel": function () {
				$(this).dialog('close');
			},
			"Go Back": function () {
				$("#failRegisterDialog").dialog("close");
				$("#signUpDialog").dialog("open");
			}
		}	
	});
	$('#databaseConnectErrorDialog').dialog({
		autoOpen: false,
		position: {of: window, my:"center center", at:"center center"},
		modal: true,
		draggable: false,
		resizable: false,
		width: 400,
	});
	
	
	$("#accountOpener").click(function() { //If the user is not logged in, when they click the account button show the sign up dialog box.
		$("#loginDialog").dialog("open");
		$("#databaseConnectErrorDialog").dialog("open");
	});
	
	
	$("#newAccountOpener").click(function() { //If the user clicks the create a new account link, close the sign up dialog and open the create an account dialog.
		$("#signUpDialog").dialog("open");
		$("#loginDialog").dialog("close");
	});
	
	$("#signInOpener").click(function() { //If the user clicks the sign in link (On the create a new account dialog), close the create a new account dialog and open the sign in dialog.
		$("#signUpDialog").dialog("close");
		$("#loginDialog").dialog("open");
	});
});