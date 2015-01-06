<!--
-------------------
Title: orderDisplay.php
Version: 2.0
Date: 12/04/2014
-------------------
-->

<?php
	$Title = "Full Quiver Order";
	$Page = "Order";
	include 'masterPageTop.php';
?>			

<br/>
<br/>
<br/>
<div class="orderContainer">
	<?php
		if (isDatabaseConnected()) {
			$FLAG = FALSE; //Creates a flag that checks to see if the order can be displayed.
			$FLAGQuery = FALSE; //Creates a flag that checks to see if the order number is in the query string.
			$FLAGNonMember = FALSE; //Creates a flag that checks to see if the order was made from a non member or from a member.
			
			if (isset($_GET['order'])) { //Checks to see if the order number is in the query string.
				$FLAGQuery = TRUE;
			}
			
			
			if ($FLAGQuery == TRUE) { //If the order number is in the query string.
				$result = mysqli_query($link, sqlStatements("SELECT", "ORDER HAS ACCOUNT")); //Checks to see if the current order is in the order_customer table.
				
				if (!$row = mysqli_fetch_array($result)) { //If the order is not in the order_customer table.
					$FLAGNonMember = TRUE; //Set the flag saying it is an order from a non member.s
				}
			}
			
			if ($FLAGQuery == TRUE && isLoggedIn()) { //Checks to see if the order number is in the query string and if the user is logged in.
				$result = mysqli_query($link, sqlStatements("SELECT", "IS RIGHT ORDER")); //Checks to see if the order belongs to this user.
			}
			
			if (@$row = mysqli_fetch_array($result) || $FLAGNonMember == TRUE) { //If the order belongs to this user or if the order is from a non member.
				$FLAG = TRUE; //Sets the flag that the order can be displayed.
			}
			
			if ($FLAG == TRUE) { //If the order can be displayed.
				$result = mysqli_query($link, sqlStatements("SELECT", "COMPLETE ORDER")); //Retrieves all of the order information from the order_product table regarding this order.
				$HTMLString = ""; //Initialize the HTMLString variable to be blank.
				$totalPrice = 0; //Start the total price off at 0.
				
				//Creates the header for the order display.
				$HTMLString .= "<div class='headerOrderInfo'>
												<div class='oneProductCell'>	
												</div>
												<div class='oneProductCellOrderDisplay'>
													<p>Product Name</p>
												</div>
												<div class='oneProductCellOrderDisplay'>
													<p>Quantity</p>
												</div>
												<div class='oneProductCellOrderDisplay'>
													<p>Price</p>
												</div>
												<div class='oneProductCellOrderDisplay'>
													<p>Total Price</p>
												</div>
											</div>";
				
				//Loop while there are still products that need t be displayed.
				while ($row = mysqli_fetch_array($result)) { 
					$totalPrice += $row['price'] * $row['quantity']; //Increase the total price by the cost of the current item.
							
					//Creates the HTML for each product's cell.		
					$HTMLString .= "<div class='oneProductOrderDisplay'>
											<div class='oneProductCell'>
												<img src='Images/Products/Thumbnail/" . $row['product_id'] . ".png' />
											</div>
											<div class='oneProductCellOrderDisplay'>
												<p>" . $row['product_name'] . "</p>
											</div>
											<div class='oneProductCellOrderDisplay'>
												<p>" . $row['quantity'] . "</p>
											</div>
											<div class='oneProductCellOrderDisplay'>
												<p>$" . $row['price'] . "</p>
											</div>
											<div class='oneProductCellOrderDisplay'>
												<p>$" . $row['price'] * $row['quantity'] . "</p>
											</div>
										</div>";
				}
				
				//Creates the HTML for the footer of the order details.
				$HTMLString .= "<div class='oneProductOrderDisplay'>
												<div class='oneProductCell'>	
												</div>
												<div class='oneProductCellOrderDisplay'>
												</div>
												<div class='oneProductCellOrderDisplay'>
												</div>
												<div class='oneProductCellOrderDisplay'>
												</div>
												<div class='oneProductCellOrderDisplay'>
													<p>$" . $totalPrice . "</p>
												</div>
											</div>";
				
				//Display all of the HTML that was created.
				echo $HTMLString;
			}
			else { //Inform the user that there has been an error displaying the order.
				echo "Woops! That order does not belong to you!";
			}
		}
	?>
</div>


<?php
	include 'masterPageBottom.php';
?>