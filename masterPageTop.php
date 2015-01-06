<!DOCTYPE html>
<!--
-------------------
Title: masterPageTop.php
Version: 5.0
Date: 12/04/2014
-------------------
-->

<!--
TASKS THAT I WOULD LIKE DONE
	-Clean up code.
-->


<?php
	//Start the session
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	include 'PHPScripts/helperFunctions.php'; //Includes functions that are used to simplify other code.
	include 'PHPScripts/databaseConnect.php'; //Includes functions that start and close a database connection.
	include 'PHPScripts/sqlStatements.php'; //Includes functions that return SQL statements.
	include 'PHPScripts/formSubmits.php'; //Includes functions that are used for creating an account or signing into your account.
?>
<html>
	<head>
		<title><?php echo $Title; ?></title>
		
		<link rel="stylesheet" href="JQueryAddons/BXSlider/jquery.bxslider.css" />
		<link rel="stylesheet" href="CSS/jquery-ui.min.css">
		<link rel='stylesheet' href='CSS/redesignCSS.css' />
		<link rel='icon' type='image/jpg' href='Images/QuiverIcon.jpg' />
		
		<script src="Javascript/jquery-latest.min.js"></script>
		<script src="Javascript/jquery-ui.min.js"></script>
		<script src="JQueryAddons/BXSlider/jquery.bxslider.js"></script>
		
		<?php
			if ($Page == "Products") {
				echo "<script src='Javascript/products.js'></script>";
			}
			else if ($Page == "Account") {
				echo "<script src='Javascript/userAccount.js'></script>";
			}
		?>
		
		<script src="Javascript/masterPage.js"></script>
	</head>
	<body>
		<div id="top">
		</div>
		<div>
			<?php
				startConnection($link); //Starts the connection with the database. Location: databaseConnect.php		
				include 'accountDialogs.php'; //Adds all of the HTML for the dialog boxes. 
			?>
		</div>
		<div class="mainNav">
			<div class="navImage">
				<a href="index.php"><img id="logo" class="headerImage" src="Images/LogoBlack5.png"/></a>
			</div>
			<div class="navLinks">
				<?php 
					//Sets the links for all of the nav bar. Accounts is not included because accounts is added later.
					$PageListName = array("HOME", "PRODUCTS", "TUTORIALS", "ABOUT&nbsp;US");
					$PageURL = array("index.php", "products.php?filter=none", "tutorial.php", "aboutUs.php");	
					
					//Displays all of the links in the Nav bar except the account and shopping cart.
					for ($i = 0; $i < count($PageListName); $i++) {
						echo "<a href='" . $PageURL[$i] . "'>" . $PageListName[$i] . "</a>";
					}
				
					if (isDatabaseConnected()) {	
						if (isset($_POST['accountLogIn'])) {
							userLogIn($link); //Tries to log the user in. Location: PHPScipts/formSubmits.php
						}
						else if (isset($_POST['accountRegister'])) { //Checks to see if the user is registering.
							userRegister($link); //Tries to register the user. Location: PHPScripts/formSubmits.php
						}
					}
					
					if (isLoggedIn()) { //Checks to see if the user is currently logged in. Location: PHPScripts/helperFunctions.php
						//Displays the Account button so the user can go to their account.
						echo "<a href='userAccount.php'>ACCOUNT</a>";
					}
					else { //If there is no user signed in. Display the Sign In button so they can sign in.
						echo "<span id='accountOpener'>SIGN&nbsp;IN</span>";
					}
				?>
				
			</div>
			<div class="shoppingCartDiv">
					<a href="checkOut.php">
						<img src="Images/ShoppingCart.png" />
					
						<?php
							if (isset($_SESSION['amountInShoppingCart'])) { //Checks to see if there is anything in the shopping cart counter.
								echo $_SESSION['amountInShoppingCart']; //Displays the number of items in the shopping cart next to the shopping cart.
							}
							else { //If there is nothing in the shopping cart.
								echo "0"; //Display 0.
							}
						?>
						
					</a>
			</div>
			
		</div>
		
		
		<div id="contentDiv" class="content">
		
			
