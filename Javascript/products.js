/*
-------------------
Title: products.js
Version: 4.0
Date: 11/21/2014
-------------------
*/

var ListOfChecked = [[], []];
var Filter_Type = 0, Filter_Value = 1;
var queryString = "";
var counter = 0;

$(document).ready(function () {	
	retrieveQueryString();

	$("#productDialog").dialog({ //Enables the dialog box that will be used when the user clicks on a product.
		autoOpen: false,
		position: {of: window, my:"center center", at:"center center"},
		modal: true,
		draggable: false,
		resizable: false,
		width: 600,
		height: 700
	});
	
	
	//Shows and hides more specific filters for each product.
	$("#product_type_bow_CheckBox").change(function () { //Bows.
		showSpecificFilter("Bow");
		if (this.checked) {
			addFilter('product_type', 'bow');
		}
		else {
			removeFilter('product_type', 'bow');
		}
	});
	$("#product_type_quiver_CheckBox").change(function () { //Quiver.
		showSpecificFilter("Quiver");
		if (this.checked) {
			addFilter('product_type', 'quiver');
		}
		else {
			removeFilter('product_type', 'quiver');
		}
	});
	$("#product_type_scope_CheckBox").change(function () { //Scope.
		showSpecificFilter("Scope");
		if (this.checked) {
			addFilter('product_type', 'scope');
		}
		else {
			removeFilter('product_type', 'scope');
		}
	});
	$("#product_type_stand_CheckBox").change(function () { //Stands.
		showSpecificFilter("Stand");
		if (this.checked) {
			addFilter('product_type', 'stand');
		}
		else {
			removeFilter('product_type', 'stand');
		}
	});
	$("#product_type_string_CheckBox").change(function () { //Stands.
		showSpecificFilter("String");
		if (this.checked) {
			addFilter('product_type', 'string');
		}
		else {
			removeFilter('product_type', 'string');
		}
	});
	
	
	//ListOfChecked = $("#filterDiv input:checkbox").length;
});



function showProductFilter(Product, Column) { //When the name of a Filter Category is clicked, either hide or show the contents of this Filter Category.
	if ($("#" + Product + "_" + Column + "_FilterOptions").is(":visible")) {
		$("#" + Product + "_" + Column + "_FilterOptions").hide();
	}
	else {
		$("#" + Product + "_" + Column + "_FilterOptions").show();
	}
}

function showSpecificFilter(Product) { //When one of the product types is clicked, show specific filters for that product.
	if ($("#div_" + Product + "_Filters").is(":visible")) {
		$("#div_" + Product + "_Filters").hide();
		$("#div_" + Product + "_Filters .classUncheck").attr("checked", false); //Unchecks a filter group when the group is not shown.
		$("#div_" + Product + "_Filters .classUncheck").trigger("change"); //Triggers the event that happens when a checkbox is changed.
	}
	else {
		$("#div_" + Product + "_Filters").show();
	}
}

function addFilter(FilterName, FilterValue) { //Adds a value from a check box, into an array of filters that are checked.
	ListOfChecked[Filter_Type].push(FilterName);
	ListOfChecked[Filter_Value].push(FilterValue);
	
	window.history.replaceState(null, "", buildQueryString());
	$("#shoppingCartForm").attr("action", "products.php" + buildQueryString());
	
	filterProducts(); //Filters the products every time a filter is added.
}

function removeFilter(FilterName, FilterValue) { //Removes a value from a check box, from an array of filters that are checked.
	for (var i = 0; i < ListOfChecked[0].length; i++) {
		if (ListOfChecked[Filter_Type][i] === FilterName && ListOfChecked[1][i] === FilterValue) {
			ListOfChecked[Filter_Type].splice(i, 1);
			ListOfChecked[Filter_Value].splice(i, 1);
		}
	}
	
	window.history.replaceState(null, "", buildQueryString());
	$("#shoppingCartForm").attr("action", "products.php" + buildQueryString());
	
	filterProducts(); //Filters the products every time a filter is removed.
}

function retrieveQueryString() {
	var arrayHolder;
	var idHolder;
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
	
	if (q) {
		for (var i = 0; i < q.length; i++) {
			arrayHolder = q[i].split("=");
			arrayHolder[0] = arrayHolder[0].replace("%20", " ");
			arrayHolder[1] = arrayHolder[1].replace("%20", " ");
			
			
			idHolder = "#" + arrayHolder[0].replace(" ", "_").replace(".", "_") + "_" + arrayHolder[1].replace(" ", "_").replace(".", "_") + "_CheckBox";
			$(idHolder).attr("checked", true); //Unchecks a filter group when the group is not shown.
			
			
			if (arrayHolder[0] === "product_type") {
				showSpecificFilter(arrayHolder[1].substr(0, 1).toUpperCase() + arrayHolder[1].substr(1));
			}
			
			if (arrayHolder[0] !== "filter") {
				ListOfChecked[Filter_Type].push(arrayHolder[0]);
				ListOfChecked[Filter_Value].push(arrayHolder[1]);
			}
		}
		filterProducts();
	}
	
}

function buildQueryString() {
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
	
	queryString = "";
	
	if (ListOfChecked[Filter_Type].length > 0) {
		queryString = "?";
	}
	
	for (var i = 0; i < ListOfChecked[Filter_Type].length; i++) {
		if (queryString.length > 1) {
			queryString += "&";
		}
		queryString += ListOfChecked[Filter_Type][i] + "=" + ListOfChecked[Filter_Value][i];
	}
	
	if (!queryString.length > 0) {
		queryString = "?filter=none";
	}
	
	return queryString;
}

function filterProducts() { //Filters the products. Right now all it does is hide everything.
	var dataString = "";
	var productFilterString = "";
	var FLAG = false, productFLAG = false, productDataFLAG = false;
	//FLAG is used for deciding if a product filter is checked.
	//productFLAG is used for determining if the user is filtering by anything other than product filter.
	//productDataFLAG is used for
	
	$("div.productCell").hide(); //Hide every product at the start of filtering.
	
	
	
	if (ListOfChecked[0].length !== 0) { //Checks to see if any filter options are selected.
		for (var i = 0; i < ListOfChecked[Filter_Type].length; i++) { //Loop through the filters.
			if (ListOfChecked[Filter_Type][i] == "product_type") { //Checks to see if any filters are for the product type.
				productFilterString = "[data-product_type='" + ListOfChecked[Filter_Value][i] + "']";
				$("div.productCell" + productFilterString).show(); //Display the products based on product type.
				FLAG = true; //Set a flag true so the code knows that the products are being filtered by product type.
			}
		}
		
		if (FLAG == true) { //Checks to see if the products are being filtered by product type.
			for (var i = 0; i < ListOfChecked[Filter_Type].length; i++) { //Checks to see if there are any filters that are not product type.
				if (ListOfChecked[Filter_Type][i] != "product_type") {
					productFLAG = true;
				}
			}
		
			if (productFLAG == true) { //If there are any filters that are not product type.
				$("div.productCell:visible").each(function () { //Loops through all of the products currently being shown.
					for (var i = 0; i < ListOfChecked[Filter_Type].length; i++) { //Loops through all the selected filters.
						if (ListOfChecked[Filter_Type][i] != "product_type") { //Checks to see if the filter being looked at is not the product type filter.
							if ($(this).data(ListOfChecked[Filter_Type][i]) == ListOfChecked[Filter_Value][i]) { //Checks to see if the product being looked at has the filter being looked at.
								productDataFLAG = true;
								i = ListOfChecked[Filter_Type].length;
							}
						}
					}
					if (productDataFLAG == false) {
						$(this).hide();
					}
					else {
						productDataFLAG = false;
					}
				});
			}
		}
		else { //
			for (var i = 0; i < ListOfChecked[Filter_Type].length; i++) {
				dataString = "[data-" + ListOfChecked[Filter_Type][i] + "='" + ListOfChecked[Filter_Value][i] + "']";
				$("div.productCell" + dataString).show();
			}
		}
	}
	else { //If no filters are selected, show everything.
		$("div.productCell").show();
	}
}

function productDialogSetter(ProductId, ProductName, ProductPrice, ProductColor, ProductType, BowStyle, BowWeight, BowMaterial, BowRange, QuiverModel, QuiverSize, ScopeDiam, ScopeLength, ScopeMagnif, StandHeight, StringStyle, StringStrand) {
	//CREATE A FOR EACH THAT HIDES ALL OF THE SPECIFIC INFORMATION (Bow Height, Quiver Size)
	$("#specificFeatures p").each(function () {
		$(this).hide();
	});
	
	if (ProductType == "bow") { //Reveal the specific information for the product currently being looked at.
		$(".bowDetails").show();
	}
	else if (ProductType == "quiver") {
		$(".quiverDetails").show();
	}
	else if (ProductType == "scope") {
		$(".scopeDetails").show();
	}
	else if (ProductType == "stand") {
		$(".standDetails").show();
	}
	else if (ProductType == "string") {
		$(".stringDetails").show();
	}
	
	$("#productDialogImage").attr("src", "Images/Products/Thumbnail/" + ProductId + ".png");
	$("#productDialogName").text(ProductName);
	$("#productDialogPrice").text(ProductPrice);
	$("#productDialogColor").text(ProductColor);
	
	$("#productDialogBoxStyle").text(BowStyle);
	$("#productDialogBowWeight").text(BowWeight);
	$("#productDialogBowMaterial").text(BowMaterial);
	$("#productDialogBowRange").text(BowRange);
	
	$("#productDialogQuiverModel").text(QuiverModel);
	$("#productDialogQuiverSize").text(QuiverSize);
	
	$("#productDialogScopeDiameter").text(ScopeDiam);
	$("#productDialogScopeLength").text(ScopeLength);
	$("#productDialogScopeMag").text(ScopeMagnif);
	
	$("#productDialogStandHeight").text(StandHeight);
	
	$("#productDialogStringStyle").text(StringStyle);
	$("#productDialogStringStrandCount").text(StringStrand);
	
	
	$("#itemId").val(ProductId);
	
	$("#productDialog").dialog("open").delay(5000);
}