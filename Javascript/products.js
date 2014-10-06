$(document).ready(function () {
	
	//All of the filter titles. This will give them all a click function to show their filter check boxes.
	$("#productsFilter").click(function () { //Products
		showProductFilter("products");
	});
	//Filters for every product.
	$("#colorFilter").click(function () { //Color
		showProductFilter("color");
	});
	$("#manufacturerFilter").click(function () { //Manufacturer
		showProductFilter("manufacturer");
	});
	$("#skillLevelFilter").click(function () { //Skill Level
		showProductFilter("skillLevel");
	});
	$("#priceRangeFilter").click(function () { //Price Range
		showProductFilter("priceRange");
	});
	
	
	//Specific Bow Related Filters
	$("#rangeFilter").click(function () { //Bow Range
		showProductFilter("range");
	});
	$("#bowStyleFilter").click(function () { //Bow Style
		showProductFilter("bowStyle");
	});
	$("#bowWeightFilter").click(function () { //Bow Weights
		showProductFilter("bowWeight");
	});
	$("#bowMaterialFilter").click(function () { //Bow Material
		showProductFilter("bowMaterial");
	});
	
	
	//Specific Gear Related Filters
	$("#gearSizeFilter").click(function () { //Gear Size
		showProductFilter("gearSize");
	});
	$("#gearGenderFilter").click(function () { //Gear Gender
		showProductFilter("gearGender");
	});
	$("#gearModelFilter").click(function () { //Gear Model
		showProductFilter("gearModel");
	});
	$("#gearTypeFilter").click(function () { //Gear Model
		showProductFilter("gearType");
	});
	$("#gearStyleFilter").click(function () { //Gear Style
		showProductFilter("gearStyle");
	});
	
	
	//Specific Quiver Related Filters
	$("#quiverSizeFilter").click(function () { //Quiver Size
		showProductFilter("quiverSize");
	});
	
	
	//Specific Scope Related Filters
	$("#scopeDiameterFilter").click(function () { //Scope Diameter
		showProductFilter("scopeDiameter");
	});
	$("#scopeLengthFilter").click(function () { //Scope Length
		showProductFilter("scopeLength");
	});
	$("#scopeMagnificationFilter").click(function () { //Scope Magnification
		showProductFilter("scopeMagnification");
	});
	$("#scopeSightStyleFilter").click(function () { //Scope Pin Number
		showProductFilter("scopeSightStyle");
	});
	
	
	//Specific Stand Related Filters
	$("#standHeightFilter").click(function () { //Stand Height
		showProductFilter("standHeight");
	});
	
	
	
	
	//Shows and hides more specific filters for each product.
	$("#bowCheckBox").change(function () { //Bows.
		showSpecificFilter("Bow");
	});
	$("#gearCheckBox").change(function () { //Gear.
		showSpecificFilter("Gear");
	});
	$("#quiverCheckBox").change(function () { //Quiver.
		showSpecificFilter("Quiver");
	});
	$("#scopeCheckBox").change(function () { //Scope.
		showSpecificFilter("Scope");
	});
	$("#standCheckBox").change(function () { //Stands.
		showSpecificFilter("Stand");
	});
});


function showProductFilter(Name) {
	if ($("#" + Name + "FilterOptions").is(":visible")) {
		$("#" + Name + "FilterOptions").hide();
	}
	else {
		$("#" + Name + "FilterOptions").show();
	}
}

function showSpecificFilter(Product) {
	if ($("#div" + Product + "Filters").is(":visible")) {
		$("#div" + Product + "Filters").hide();
	}
	else {
		$("#div" + Product + "Filters").show();
	}
}