<!--
-------------------
Title: masterPageTop.php
Version: 1.0
Date: 09/18/2014
-------------------
-->

<?php
	//Start the session
	session_start();
?>
<html>
	<head>
		<title><?php echo $Title; ?></title>
		<link rel="icon" type="image/jpg" href="Images/QuiverIcon.jpg">
		
		<link rel="stylesheet" href="CSS/indexCSS.css" />
		<link rel="stylesheet" href="JQueryAddons/ResponsiveSlides/responsiveslides.css" />
		<link rel="stylesheet" href="JQueryAddons/ResponsiveSlides/Paging.css" />
		<link rel="stylesheet" href="CSS/jquery-ui.min.css">
		
		<script src="Javascript/jquery-latest.min.js"></script>
		<script src="Javascript/jquery-ui.min.js"></script>
		<script src="JQueryAddons/ResponsiveSlides/responsiveslides.js"></script>
		<?php
			if ($Page == "Products") {
				echo "<script src='Javascript/products.js'></script>";
			}
		?>
		
		<script>
			$(document).ready(function () { 
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
			
				$(function() { //Used to create the slide show.
					$(".rslides").responsiveSlides({
						startidx: vars['slideshow'],
						pager: true
					});
				});
				
			
				$("#loginDialog").dialog({ //Enables the dialog box that is used to log in.
					autoOpen: false,
					position: { my:"center", at:"center", of:".mainNav"},
					modal: false,
					draggable: false,
					resizable: false,
					width: 500,
					height: 300
				});
				
				$("#signUpDialog").dialog({ //Enables the dialog box that is used for creating a new account.
					autoOpen: false,
					position: { my:"center", at:"center", of:".mainNav"},
					modal: false,
					draggable: false,
					resizable: false,
					width: 500,
					height: 400
				});
				
				$("#signedInDialog").dialog({ //Enables the dialog box that is used to tell the user they logged in correctly.
					autoOpen: false,
					position: { my:"center", at:"center", of:".mainNav" },
					modal: false,
					draggable: false,
					resizable: false,
					width: 400,
					buttons: {
						"Stay Here": function () {
							$(this).dialog('close');
						},
						"Go To Account": function () {
							window.location.replace('userAccount.php');
						}
					}	
				});
				
				$('#failLogInDialog').dialog({
					autoOpen: false,
					position: { my:"center", at:"center", of:".mainNav" },
					modal: false,
					draggable: false,
					resizable: false,
					width: 400,
					buttons: {
						"Cancel": function () {
							$(this).dialog('close');
						},
						"Try Again": function () {
							$("#failLogInDialog").dialog("close");
							$("#loginDialog").dialog("open");
						}
					}	
				});
				
				$("#accountOpener").click(function() { //If the user is not logged in, when they click the account button show the sign up dialog box.
					$("#loginDialog").dialog("open");
				});
				
				
				$("#newAccountOpener").click(function() { //If the user clicks the create a new account link, close the sign up dialog and open the create an account dialog.
					$("#signUpDialog").dialog("open");
					$("#loginDialog").dialog("close");
				});
				
				$("#signInOpener").click(function() { //If the user clicks the sign in link (On the create a new account dialog), close the create a new account dialog and open the sign in dialog.
					$("#signUpDialog").dialog("close");
					$("#loginDialog").dialog("open");
				});
			});
		</script>
	</head>
	<body>
		<a href="#"><div style="position: absolute; width: 50px; height: 50px; left: 10px;"></div></a>
		
		<div id="content">
			<ul class="rslides">
				<li><a href="index.php?slideshow=0"><img src="Images/ArrowUp.jpg" alt="" /></a></li>
				<li><a href="index.php?slideshow=1"><img src="Images/ArrowRight.jpg" alt="" /></a></li>
				<li><a href="index.php?slideshow=2"><img src="Images/ArrowDown.jpg" alt="" /></a></li>
				<li><a href="index.php?slideshow=3"><img src="Images/ArrowLeft.jpg" alt="" /></a></li>
			</ul>
		
			<img id="logo" class="headerImage" src="Images/LogoWhite1.png"/>
			
			<?php include 'accountDialogs.php' ?>
			
			<div class="mainNav">
				<?php 
					$PageListName = ["Home", "Products", "Tutorials", "About Us", "Contact Us"];
					$PageURL = ["index.php", "products.php", "tutorial.php", "aboutUs.php", "contactUs.php"];	
					
					for ($i = 0; $i < count($PageListName); $i++) {
						if ($PageListName[$i] == $Page) {
							echo '<span>', $PageListName[$i], '</span>';
						}
						else {
							echo '<a href="',$PageURL[$i], '">', $PageListName[$i], '</a>';
						}
					}
					
					$result = array(); //Declare the array for later use.
					if (strcmp($Page, "Account") == 0 ) {
						$_SESSION['AccountPage'] = True;
					}
					else {
						$_SESSION['AccountPage'] = False;
					}
				
					if (isset($_POST['Submit'])) {	
						
						if ($_POST['submitType'] == "SIGNIN") {
							$Username = "CrunchyHotDogs";
							$Password = "password";
							//DATABASE SELECT STATEMENT TO CHECK IF USER IS A MEMBER
							
							//Will be replacing this with a check to see if the database call returned any rows.
							if (strcmp($_POST['signInUserName'], $Username) == 0 && strcmp($_POST['signInPassword'], $Password) == 0) {
								$_SESSION['User'] = $Username; //Store the user's user name in the session.
								//Create a string that will display a dialog saying the user has logged in.
								$ScriptString = "<script>$(document).ready(function () {";
								$ScriptString .= "$('#loggedInUser').text('Thank you for signing in to Full Quiver, " . $_SESSION['User'] . "!'); ";
								$ScriptString .= "$('#signedInDialog').dialog('open');";
								$ScriptString .= "});";
								$ScriptString .= "</script>";
							}
							else {
								//Create a string that will display a dialog saying the user has failed at logging in.
								$ScriptString = "<script>$(document).ready(function () {";
								$ScriptString .= "$('#failedLogIn').text('You have entered incorrect login information.');";
								$ScriptString .= "$('#failLogInDialog').dialog('open');";
								$ScriptString .= "});";
								$ScriptString .= "</script>";
							}
							//Output the script.
							echo $ScriptString;
						}
					}
					
					if (isset($_SESSION['User'])) {
						//USER HAS SIGNED IN
						if ($_SESSION['AccountPage'] == False) { //Checks to see which page the user is on.
							echo "<a href='userAccount.php'>Account</a>";
						}
						else {
							echo "<span>Account</span>";
						}
					}
					else {
						//USER HAS NOT SIGNED IN
						echo "<span id='accountOpener'>Account</span>";
					}
				?>
			</div>
