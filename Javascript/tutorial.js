$(document).ready(function () {
	$("#useBowTitle").click(function () {
		if ($("#useBow").is(":visible")) {
			$("#useBow").hide();
		} 
		else {
			$("#useBow").show();
		}
	});
	
	$("#BowCare").click(function () {
		if ($(".thing").is(":visible")) {
			$(".thing").hide();
		} 
		else {
			$(".thing").show();
		}
	});
	
	$("#bowCareCompoundTitle").click(function () {
		if ($("#bowCareCompound").is(":visible")) {
			$("#bowCareCompound").hide();
		} 
		else {
			$("#bowCareCompound").show();
		}
	});
	
	$("#bowCareWoodTitle").click(function () {
		if ($("#bowCarewood").is(":visible")) {
			$("#bowCarewood").hide();
		} 
		else {
			$("#bowCarewood").show();
		}
	});
});