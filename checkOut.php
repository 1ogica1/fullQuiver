<!--
-------------------
Title: checkOut.php
Version: 3.0
Date: 12/04/2014
-------------------
-->

<?php
	//Start the session.
	session_start();
	
	//Create a variable for the items in the shopping cart.
	$itemArray;
	//If there are items in the shopping cart, set the array to contain them.
	if (isset($_SESSION['itemsInCart'])) {
		$itemArray = $_SESSION['itemsInCart'];
	}
	else { //Initialize an empty array if there are no items in the shopping cart.
		$itemArray = array(array(), array());
	}

	if (sizeOf($itemArray[0]) > 0 && isset($_POST['removeItem'])) { //Checks to see if there are items in the shopping cart and if the user is editing quantities.
		if ($_POST['removeItemQuantity'] >= 0) {
			$itemToRemove = array_search($_POST['removeItemId'], $itemArray[0]); //Figure the index of the item being removed.

			if ($_POST['removeItemQuantity'] > 0) { //Checks to see if the quantity is bigger than the amount being removed.
				$_SESSION['amountInShoppingCart'] -= $itemArray[1][$itemToRemove];
				$_SESSION['amountInShoppingCart'] += $_POST['removeItemQuantity']; //Remove the amount from the shopping cart counter.
				
				$itemArray[1][$itemToRemove] = $_POST['removeItemQuantity'];  //Reduce the quantity by the amount being removed.
			}
			else { //If the amount being reduced is greater than the quantity.
				$_SESSION['amountInShoppingCart'] -= $itemArray[1][$itemToRemove]; //Remove the item from the shopping cart counter.

				unset($itemArray[0][$itemToRemove], $itemArray[1][$itemToRemove]); //Remove the item from the shopping cart.
				$itemArray[0] = array_values($itemArray[0]); //Recreate the array so there are no blank index's.
				$itemArray[1] = array_values($itemArray[1]); //Recreate the array so there are no blank index's.
			}
		}
		$_SESSION['itemsInCart'] = $itemArray; //Set the session to hold the new shopping cart.
	}
			
	$Title = "Full Quiver - Check Out";
	$Page = "Check Out";
	include 'masterPageTop.php';
?>

	</br>
	</br>
	</br>
	
	<div class="checkOutContainer">
		<?php					
			$HTMLString = "";
		
			if (sizeOf($itemArray[0]) > 0 && !isset($_POST['checkOutSubmit'])) { //Checks to see if there are any items in the shopping cart. Also checks to see if the user has not clicked the submit button.
				$totalPrice = 0; //Set the start price to 0.
				
				if (isDatabaseConnected()) { //Checks to see if database is connected.
					//Create the HTML code that will be used  for the header info.
					$HTMLString .= "<div class='headerProductInfo'>
												<div class='oneProductCell'>
														
												</div>
												<div class='oneProductCell'>
													<p>Product Name</p>
												</div>
												<div class='oneProductCell'>
													<p>Quantity</p>
												</div>
												<div class='oneProductCell'>
													<p>Price</p>
												</div>
												<div class='oneProductCell'>
													<p>Total Price</p>
												</div>
											</div>";
				
					for ($i = 0; $i < sizeOf($itemArray[0]); $i++) { //Loops through the whole shopping cart.
						$result = mysqli_query($link, sqlStatementsCheckOut($itemArray[0][$i], null, 0, null)); //Retrieves information about the current product.
						
						if ($row = mysqli_fetch_array($result)) { //Gets the information for the product out of the result.
							$totalPrice += $row['price'] * $itemArray[1][$i]; //Increase the total price of the whole order.
							
							//Create the HTML for the current product cell.
							$HTMLString .= 	"<div class='oneProduct'>
												<div class='oneProductCell'>
													<img src='Images/Products/Thumbnail/" . $itemArray[0][$i] . ".png' />
												</div>
												<div class='oneProductCell'>
													<p>" . $row['product_name'] . "</p>
												</div>
												<div class='oneProductCell'>
													<p>" . $itemArray[1][$i] . "</p>
												</div>
												<div class='oneProductCell'>
													<p>$" . $row['price'] . "</p>
												</div>
												<div class='oneProductCell'>
													<p>$" . $row['price'] * $itemArray[1][$i] . "</p>
												</div>
												<div class='oneProductCell'>
													<form method='POST' action='checkOut.php'>
														<input type='hidden' name='removeItemId' value='" . $itemArray[0][$i] . "' />
														<input type='number' class='quantityToRemove' name='removeItemQuantity' value='1' />
														<input type='submit' name='removeItem' value='Update Quantity' />
													</form>
												</div>
											</div>";
						}
					}
					
					//Create the HTML for the footer of the check out.
					$HTMLString .= "<div class='headerProductInfo'>
												<div class='oneProductCell'>	
												</div>
												<div class='oneProductCell'>
												</div>
												<div class='oneProductCell'>
												</div>
												<div class='oneProductCell'>
												</div>
												<div class='oneProductCell'>
													<p>$" . $totalPrice . "</p>
												</div>";
												
					if (isLoggedIn()) {
					
						$HTMLString .= "<div class='oneProductCell'>
											<form method='POST' action='checkOut.php'>
												<input type='submit' name='checkOutSubmit' value='Check Out' />
											</form>
										</div>
									</div>";
					}
					else {
						$HTMLString .= "<div class='oneProductCell'>
											REQUIRED SIGN IN
										</div>
									</div>";
					}
				}
			}
			else if (sizeOf($itemArray[0]) > 0 && isset($_POST['checkOutSubmit'])) { //Checks to see if there are items in the shopping cart and if the user has clicked the submit button.
				
				if (isDatabaseConnected()) { //Checks to see if the database is connected.
					mysqli_query($link, sqlStatementsCheckOut(null, null, 1, null)); //Insert a new order into the order_table table.
					
					$lastInserted = mysqli_insert_id($link); //Retrieve the order_id of the last inserted order.
					
					for ($i = 0; $i < sizeOf($itemArray[0]); $i++) { //Loops through the shopping cart.
						mysqli_query($link, sqlStatementsCheckOut($itemArray[0][$i], $itemArray[1][$i], 2, $lastInserted)); //Adds what the user ordered into the order_product table.
					}
					
					if (isLoggedIn()) { //Checks to see if there is a user logged in.
						mysqli_query($link, sqlStatementsCheckOut(null, null, 3, $lastInserted)); //Add a row into the order_customer table, to keep track of their history.
					}
					
					unset($_SESSION['itemsInCart']); //Clear the shopping cart.
					unset($_SESSION['amountInShoppingCart']); //Clear the number of items in the shopping cart.
					
					//Lets the user know that their order was successfully submitted. Gives them the option to continue shopping or to view their order.
					$HTMLString = "<div class='orderFinished'>
									<p>Thank you for ordering with FullQuiver!</p>
									<a href='products.php?filter=none'><input type='button' value='Continue Shopping'/></a>
									<a href='orderDisplay.php?order=" . $lastInserted . "'><input type='button' value='View Order'/></a>
									<img src='Images/plant.png' id='plant' />
									</div>";
				}
				else { //In case the database is not connected.
					$HTMLString = "<p class='shoppingCartCenterMessage'>Sorry, something has gone wrong with our database. Please contact IT Support.</p>";
				}
			}
			else if (!isset($_POST['checkOutSubmit'])) { //If there are no items in the shopping cart and the user is not submitting.
				$HTMLString = "<p class='shoppingCartCenterMessage'>Sorry, there are currently no items in your shopping cart</p>"; //Tell the user they need items in their shopping cart.
			}
			
			//Display all of the HTML that was built to the screen.
			echo $HTMLString;
		?>
	</div>
	
<?php
	include 'masterPageBottom.php';
?>