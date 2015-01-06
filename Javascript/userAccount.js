/*
-------------------
Title: userAccount.js
Version: 2.0
Date: 11/21/2014
-------------------
*/

$(document).ready(function () {
	$("#changeInfoButton").click(function () {
		if ($("#infoChange").is(":visible")) {
			$("#infoChange").hide();
		} 
		else {
			$("#infoChange").show();
		}
	});
	
	$("#displayOrderHistory").click(function () {
		if ($("#orderHistory").is(":visible")) {
			$("#orderHistory").hide();
		} 
		else {
			$("#orderHistory").show();
		}
	});
});