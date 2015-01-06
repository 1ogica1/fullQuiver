<?php
	/*
	-------------------
	Title: helperFunctions.php
	Version: 4.0
	Date: 11/21/2014
	-------------------
	*/

	function isLoggedIn() { //Checks to see if the user is logged in.
		$isLoggedInFLAG = FALSE;
		
		if (isset($_SESSION['UserID'])) {
			$isLoggedInFLAG = TRUE;
		}
		
		return $isLoggedInFLAG;
	}
	
	function isDatabaseConnected() { //Checks to see if the database is connected. Will return true if the database is connected and false if the database is not connected.
		$isDatabaseConnectedFLAG = FALSE;
		if (isset($_SESSION['DatabaseConnected'])) {
			$isDatabaseConnectedFLAG = $_SESSION['DatabaseConnected'];
		}
		
		return $isDatabaseConnectedFLAG;
	}
	
	function formatTitle($Title, $Product) { //Formats the title of each filter group. Example : bow_range converts into Bow Range. range converts into Bow Range.
		if (empty($Product) === FALSE && strcmp("Product", $Product) !== 0) {
			if (strpos(strtolower($Title), strtolower($Product)) === FALSE) {
				$Title = $Product . " " . $Title;
			}
		}
			
		$Title = ucwords(str_replace("_", " ", $Title));
		
		return $Title;
	}
	
	function formatId($Id) {
		$Id = str_replace(".", "_", str_replace(" ", "_", $Id));
		
		return $Id;
	}
	
	function formatData($Data) { //Capitalizes each word for the filter option.
		$Data = ucwords($Data);
		
		return $Data;
	}
	
	function clickHeaderFunctionBuilder($tableName, $columnField) { //Creates the JS for each click event. The click event happens when the user clicks on the title of a filter group.
		$ScriptString = "";
		
		$ScriptString .= "$('#" . $tableName . "_" . $columnField . "_Filter').click(function () {"; //Creates a click function on the <a> control.
		$ScriptString .= "showProductFilter('" . $tableName . "', '" . $columnField . "'); "; //Adds a function for the on click action of the <a> control. This function hides/shows the filters.
		$ScriptString .= "}); ";
		
		return $ScriptString;
	}
	
	function clickCheckBoxBuilder($rowData, $columnField) {
		$ScriptString = "";
		
		$ScriptString .= "$('#" . $columnField . "_" . formatId($rowData) . "_CheckBox').change(function () {";
		$ScriptString .= " if (this.checked) {";
		$ScriptString .= " addFilter('" . $columnField . "', '" . $rowData . "');";
		$ScriptString .= "}";
		$ScriptString .= "else {";
		$ScriptString .= " removeFilter('" . $columnField . "', '" . $rowData . "');";
		$ScriptString .= "}";
		$ScriptString .= "});";
		
		return $ScriptString;
	}
	
	function detailedProductScript($row) {	
		$ScriptString = "";
	
		$ScriptString .= " $('#productImage" . $row['product_id'] . "').click(function () { ";
		$ScriptString .= "productDialogSetter('[PRODUCT_ID]', '[PRODUCT_NAME]', '[PRODUCT_PRICE]', '[PRODUCT_COLOR]', '[PRODUCT_TYPE]', ";
		$ScriptString .= "'[BOW_STYLE]', '[BOW_WEIGHT]', '[BOW_MATERIAL]', '[BOW_RANGE]', ";
		$ScriptString .= "'[QUIVER_MODEL]', '[QUIVER_SIZE]', ";
		$ScriptString .= "'[SCOPE_DIAMETER]', '[SCOPE_LENGTH]', '[SCOPE_MAGNIF]', ";
		$ScriptString .= "'[STAND_HEIGHT]', ";
		$ScriptString .= "'[STRING_STYLE]', '[STRING_STRAND]');";
		$ScriptString .= "});";
		
		$ScriptString = str_replace("[PRODUCT_ID]", $row['product_id'], $ScriptString);
		$ScriptString = str_replace("[PRODUCT_NAME]", formatData($row['product_name']), $ScriptString);
		$ScriptString = str_replace("[PRODUCT_PRICE]", formatData($row['price']), $ScriptString);
		$ScriptString = str_replace("[PRODUCT_COLOR]", formatData($row['color']), $ScriptString);
		$ScriptString = str_replace("[PRODUCT_TYPE]", $row['product_type'], $ScriptString);
		
		$ScriptString = str_replace("[BOW_STYLE]", formatData($row['bow_style']), $ScriptString);
		$ScriptString = str_replace("[BOW_WEIGHT]", formatData($row['weight']), $ScriptString);
		$ScriptString = str_replace("[BOW_MATERIAL]", formatData($row['material']), $ScriptString);
		$ScriptString = str_replace("[BOW_RANGE]", formatData($row['bow_range']), $ScriptString);
		
		$ScriptString = str_replace("[QUIVER_MODEL]", formatData($row['model']), $ScriptString);
		$ScriptString = str_replace("[QUIVER_SIZE]", formatData($row['size']), $ScriptString);
		
		$ScriptString = str_replace("[SCOPE_DIAMETER]", formatData($row['scope_diameter']), $ScriptString);
		$ScriptString = str_replace("[SCOPE_LENGTH]", formatData($row['length']), $ScriptString);
		$ScriptString = str_replace("[SCOPE_MAGNIF]", formatData($row['magnification']), $ScriptString);
		
		$ScriptString = str_replace("[STAND_HEIGHT]", formatData($row['height']), $ScriptString);
		
		$ScriptString = str_replace("[STRING_STYLE]", formatData($row['string_style']), $ScriptString);
		$ScriptString = str_replace("[STRING_STRAND]", formatData($row['strand_count']), $ScriptString);
		
		return $ScriptString;
	}	
	
	function filterGroupBuilder($tableName, $columnField) { //Creates the HTML for each filter group. Example : Bow Range.
		$HTMLBlock = "";
		
		$HTMLBlock .= "<!--" . $columnField . "-->"; //Comment for HTML to show which product filter is being made.
		$HTMLBlock .= "<div id='div" . $tableName . "_" . $columnField . "'>"; //Div that will hold one product specific filter.
		$HTMLBlock .= "<a id='" . $tableName . "_" . $columnField . "_Filter' class='filterHeader'>" . formatTitle($columnField, $tableName) . "</a>"; //Creates the title for each filter. Format Title removes the underscores, capitalizes each word, and adds the product type to the start of each filter. Location : PHPScripts/helperFunctions.php
		$HTMLBlock .= "<div id='" . $tableName . "_" . $columnField . "_FilterOptions' class='hidden'>"; //Creates the container for each option.
		
		return $HTMLBlock;
	}
	
	function oneFilterBuilder($rowData, $columnField) { //Creates the HTML for each filter option. Example : Color --> Navy
		$HTMLBlock = "";
		
		$HTMLBlock .= "<div class='filterLabel'>";
		$HTMLBlock .= "<label>" . formatData($rowData) . "</label>"; //Format data capitalize the first letter of each word. Location : PHPScripts/helperFunctions.php
		$HTMLBlock .= "</div>";
		$HTMLBlock .= "<div class='filterCheckBox'>";
		$HTMLBlock .= "<input id='" . $columnField . "_" . formatId($rowData) . "_CheckBox' class='classUncheck' type='checkbox' />";
		$HTMLBlock .= "</div>";
		
		return $HTMLBlock;
	}
	
	
	
	////////////////////////////////////////////////////////////////////////
	//NEED TO DECIDE IF WE ARE USING THESE
	/*
	function hashPassword($nonHashedPassword) { //Hashs the user's password and database password.
		return password_hash($nonHashedPassword, PASSWORD_DEFAULT);
	}
	
	function verifyPassword($userEnteredPass, $databasePass) { //Checks to see if the users entered password matches the database password. Passwords are hashed.
		$FLAG;
		
		if (password_verify($userEnteredPass, $databasePass)) {
			$FLAG = TRUE;
		}
		else {
			$FLAG = FALSE;
		}
		
		return $FLAG;
	}
	*/
	//END NEED TO DECIDE
	////////////////////////////////////////////////////////////////////////
?>