<!--
-------------------
Title: product.php
Version: 5.0
Date: 12/04/2014
-------------------
-->

<?php
	session_start();
	
	//Adds items into the shopping cart(session).
	if (isset($_POST['shopCartSubmit'])) {
		if ($_POST['itemQuantity'] > 0) {
			$itemArray = array(array(), array());
					
			if (isset($_SESSION['amountInShoppingCart'])) {
				$_SESSION['amountInShoppingCart'] += $_POST['itemQuantity'];
			}
			else {
				$_SESSION['amountInShoppingCart'] = $_POST['itemQuantity'];
			}
		
			if (isset($_SESSION['itemsInCart'])) {
				$itemArray = $_SESSION['itemsInCart'];
				
				if (in_array($_POST['itemId'], $itemArray[0])) {
					$itemArray[1][array_search($_POST['itemId'], $itemArray[0])] += $_POST['itemQuantity'];
				}
				else {
					$itemArray[0][] = $_POST['itemId'];
					$itemArray[1][] = $_POST['itemQuantity'];				
				}
			}
			else {
				$itemArray[0][] = $_POST['itemId'];
				$itemArray[1][] = $_POST['itemQuantity'];		
			}
		
			$_SESSION['itemsInCart'] = $itemArray;
		}
	}

	$Title = 'Full Quiver - Products';
	$Page = 'Products';
	include 'masterPageTop.php';
?>
			<img src="Images/ProductsImg.png" id="ProductsImg" />
			<div id="productDialog" class="hidden">
				<p class="clear dialogBoxProductTitle"><strong></strong><span id="productDialogName"></span></p>
				
				<br/>
				<div class="productDialogContent" style="float: left;">
					<img id="productDialogImage" class="productDialogImage" />
				</div>
				
				<div id="featuresDiv" class="productDialogContent" style="float: right;">
					<p class="dialogBoxProductPrice"><strong>$<span id="productDialogPrice"></span></strong></p>
					<br/>
					<p><strong>Product Color: </strong><span id="productDialogColor"></span></p>
					
					<div id="specificFeatures" class="specificFeatures">
						<p class="hidden bowDetails"><strong>Bow Style: </strong><span id="productDialogBoxStyle"></span></p>
						<p class="hidden bowDetails"><strong>Bow Weight: </strong><span id="productDialogBowWeight"></span></p>
						<p class="hidden bowDetails"><strong>Bow Material: </strong><span id="productDialogBowMaterial"></span></p>
						<p class="hidden bowDetails"><strong>Bow Range: </strong><span id="productDialogBowRange"></span></p>
						
						<p class="hidden quiverDetails"><strong>Quiver Model: </strong><span id="productDialogQuiverModel"></span></p>
						<p class="hidden quiverDetails"><strong>Quiver Size: </strong><span id="productDialogQuiverSize"></span></p>
						
						<p class="hidden scopeDetails"><strong>Scope Diameter: </strong><span id="productDialogScopeDiameter"></span></p>
						<p class="hidden scopeDetails"><strong>Scope Length: </strong><span id="productDialogScopeLength"></span></p>
						<p class="hidden scopeDetails"><strong>Scope Magnification: </strong><span id="productDialogScopeMag"></span></p>
						
						<p class="hidden standDetails"><strong>Stand Height: </strong><span id="productDialogStandHeight"></span></p>
						
						<p class="hidden stringDetails"><strong>String Style: </strong><span id="productDialogStringStyle"></span></p>
						<p class="hidden stringDetails"><strong>Strand Count: </strong><span id="productDialogStringStrandCount"></span></p>
					</div>	
				</div>
				
				<div class="clear productDialogForm">
					<form method="POST" id="shoppingCartForm" action="<?php echo "products.php?" . $_SERVER['QUERY_STRING'];  ?>">
						<input type="hidden" id="itemId" name="itemId" />
						<input type="number" class="amountInShoppingCart" value="1" name="itemQuantity" /><br/><br/>	
						<input type="submit" class="shoppingCartSubmit" value="Add To Shopping Cart" name="shopCartSubmit" />
					</form>
				</div>
				
			</div>
			
			<div class="clear"></div>
			
			<div class="styleProductsSide">
				<div id="filterDiv">
				
					<!--Product Filter-->
					<div>
						<a id="productsFilter" class="filterHeader">Products</a>
						<div id="productsFilterOptions">
							
							<div class="filterLabel">
								<label>Bows </label>
							</div>
							<div class="filterCheckBox">
								<input id="product_type_bow_CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Quivers </label>
							</div>
							<div class="filterCheckBox">
								<input id="product_type_quiver_CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Scopes </label>
							</div>
							<div class="filterCheckBox">
								<input id="product_type_scope_CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Stands </label>
							</div>
							<div class="filterCheckBox">
								<input id="product_type_stand_CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Strings </label>
							</div>
							<div class="filterCheckBox">
								<input id="product_type_string_CheckBox" type="checkbox" />
							</div>
						</div>
					</div>
					<!--End Product Filter-->
					
					<br />
					
				<?php
					if (isDatabaseConnected()) {
						$tableNames = array("Bow", "Quiver", "Scope", "Stand", "String");
						$HTMLBlock = "";
						$ScriptString = "<script>$(document).ready(function () {";
					
						$productTable = "Product"; //Variable to hold the name of the products table.
						$productColumns = mysqli_query($link, sqlStatementsFilter($productTable, "", 1)); //Gets all of the columns for the product table.
						
						while ($column = mysqli_fetch_array($productColumns)) {
							if (strcmp($column['Field'], "product_id") !== 0 && strcmp($column['Field'], "product_name") !== 0 && strcmp($column['Field'], "supplier_id") !== 0 && strcmp($column['Field'], "price") !== 0 && strcmp($column['Field'], "product_type") !== 0 ) {
								$ScriptString .= clickHeaderFunctionBuilder($productTable, $column['Field']);
								
								
								$HTMLBlock .= filterGroupBuilder($productTable, $column['Field']);
								
								$result = mysqli_query($link, sqlStatementsFilter($productTable, $column['Field'], 0));
								
								while ($row = mysqli_fetch_array($result)) {
									$ScriptString .= clickCheckBoxBuilder($row[$column['Field']], $column['Field']);
									$HTMLBlock .= oneFilterBuilder($row[$column['Field']], $column['Field']);
								}
							
								$HTMLBlock .= "</div></div>";
								$HTMLBlock .= "<br/>";
							}
						}
						
					
						for ($i = 0; $i < count($tableNames); $i++) {
							$HTMLBlock .= "<div class='hidden' id='div_" . $tableNames[$i] . "_Filters'>"; //Div that will hold all of the product specific filters.
							
							$tableColumns = mysqli_query($link, sqlStatementsFilter($tableNames[$i], "", 1));
								
							while ($column = mysqli_fetch_array($tableColumns)) {
								if (strcmp($column['Field'], "product_id") != 0) {
									$ScriptString .= clickHeaderFunctionBuilder($tableNames[$i], $column['Field']);
									
									$HTMLBlock .= filterGroupBuilder($tableNames[$i], $column['Field']);
									
									$result = mysqli_query($link, sqlStatementsFilter($tableNames[$i], $column['Field'], 0)); //Gets all of the unique values for a specific column.
																
									while($row = mysqli_fetch_array($result)) {
										$ScriptString .= clickCheckBoxBuilder($row[$column['Field']], $column['Field']);
										$HTMLBlock .= oneFilterBuilder($row[$column['Field']], $column['Field']);
									}
									
									$HTMLBlock .= "</div></div>";
									$HTMLBlock .= "<br/>";
								}
							}
							$HTMLBlock .= "</div>";
							
							echo $HTMLBlock; //Output one filter group. Example Bow Range.
							
							$HTMLBlock = "";
						}
					}
				?>
				</div>
			</div>
			
			<div class="styleProductsMain">
				<div class="productName">
					<?php
						if (isDatabaseConnected()) {
							$result = mysqli_query($link, sqlStatements("SELECT", "PRODUCTS")); //Calls the function to return the products SQL script.
							$DataRoleString = "";
							$HTMLOutput = "";
							
							while($row = mysqli_fetch_array($result)) {
								$DataRoleString = "data-skill_level='" . $row['skill_level'] . "' data-color='" . $row['color'] . "' data-product_type='" . $row['product_type'] . "'";
								
								$ScriptString .= detailedProductScript($row);
								
								//INCLUDE IF STATEMENTS FOR THE TYPE OF PRODUCT. ADD CERTAIN data- ATTRIBUTES TO THE DIV.
								if (strcmp($row['product_type'], "bow") == 0) {
									$DataRoleString .= " data-bow_style='" . $row['bow_style'] . "' data-weight='" . $row['weight'] . "' data-material='" . $row['material'] . "' data-bow_range='" . $row['bow_range'] . "'";
								}
								else if (strcmp($row['product_type'], "quiver") == 0) {
									$DataRoleString .= " data-model='" . $row['model'] . "' data-size='" . $row['size'] . "'";
								}
								else if (strcmp($row['product_type'], "scope") == 0) {
									$DataRoleString .= " data-scope_diameter='" . $row['scope_diameter'] . "' data-length='" . $row['length'] . "' data-magnification='" . $row['magnification'] . "'";
								}
								else if (strcmp($row['product_type'], "stand") == 0) {
									$DataRoleString .= " data-height='" . $row['height'] . "'";
								}
								else if (strcmp($row['product_type'], "string") == 0) {
									$DataRoleString .= " data-string_style='" . $row['string_style'] . "' data-strand_count='" . $row['strand_count'] . "'";
								}
								
								$HTMLOutput = "<div class='productCell' " . $DataRoleString . ">\n\t\t\t\t\t\t";
								$HTMLOutput .= "<img id='productImage" . $row['product_id'] . "' class='productImage' src='Images/Products/Thumbnail/" . $row['product_id'] . ".png' />\n\t\t\t\t\t\t";
								$HTMLOutput .= "<p><strong>" . $row['product_name'] . "</strong> </br>$" . $row['price'] . "</p>\n\t\t\t\t\t";
								$HTMLOutput .= "</div>\n\t\t\t\t\t";
								
								echo $HTMLOutput;
								$DataRolestring = "";
							}
							
							$ScriptString .= "});</script>";
						}
						else {
							echo "<p>Woops! There seems to be a problem with our database! Please contact IT.</p><img src='Images/DatabaseError.jpg' />";
						}
					?>
				</div>
			</div>
			
			<div class="clear quoteParagraph">
				<p class="paragraph">If love be blind, love cannot hit the mark.</p>
				<p class="author">William Shakespear</p>
			</div>
			<div class="clear"></div>
			
<?php
	if (isDatabaseConnected()) {
		echo $ScriptString;
	}
	include 'masterPageBottom.php';
?>