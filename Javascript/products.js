$(document).ready(function () {
	$("#productsFilter").click(function () {
		showProductFilter("product");
	});
	$("#gearsFilter").click(function () {
		showProductFilter("gear");
	});
	
	$("#").change()
});


function showProductFilter(Name) {
	if ($("#" + Name + "FilterOptions").is(":visible")) {
		$("#" + Name + "FilterOptions").hide();
	}
	else {
		$("#" + Name + "FilterOptions").show();
	}
	
}