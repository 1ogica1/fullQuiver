<?php
	/*
	-------------------
	Title: formSubmits.php
	Version: 3.0
	Date: 10/30/2014
	-------------------
	*/

	function userLogIn(&$link) {
		if (isset($_POST['signInUserName']) && isset($_POST['signInPassword'])) {
			$result = mysqli_query($link, sqlStatements("SELECT", "LOGIN")); //Calls the function to return the login SQL script.
			
			//Check to see if the database call returned any rows.
			if ($row = mysqli_fetch_array($result)) {
				$_SESSION['UserID'] = $row['cust_id']; //Store the user's user name in the session.
				//Create a string that will display a dialog saying the user has logged in.
				$ScriptString = "<script>$(document).ready(function () {";
				$ScriptString .= "$('#loggedInUser').text('Thank you for signing in to Full Quiver, " . $row['f_name'] . "!'); ";
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
	
	function userRegister(&$link) {
		$FLAG = TRUE;
		$ErrorString = "";
		
		$result = mysqli_query($link, sqlStatements("SELECT", "USEDEMAIL")); //Calls the function to return the login SQL script.
		
		//Email Used Checked
		if ($row = mysqli_fetch_array($result) || empty($_POST['registerEmail'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>This email is already registered or is blank.</p>";
		}
		else if (preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $_POST['registerEmail']) != TRUE) {
			$FLAG = FALSE;
			$ErrorString .= "<p>You have entered an invalid email.</p>";
		}
		
		
		$result = mysqli_query($link, sqlStatements("SELECT", "USEDUSER")); //Calls the function to return the login SQL script.
		
		//Password Used Check
		if ($row = mysqli_fetch_array($result) || empty($_POST['registerUserName'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>This user name is already taken or is blank.</p>";
		}
		
		//Password Blank Check.
		if (empty($_POST['registerPassword'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>There is currently no password entered.</p>";
		}
		
		//First Name Check
		if (empty($_POST['registerFirstName'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>There is currently no first name entered.</p>";
		}
		
		//Last Name Check
		if (empty($_POST['registerLastName'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>There is currently no last name entered.</p>";
		}
		
		//Street Address Check
		if (empty($_POST['registerStreetAdd'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>There is currently no street address entered.</p>";
		}
		
		//City Check
		if (empty($_POST['registerCity'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>There is currently no city entered.</p>";
		}
		
		//Postal Code Check
		if (preg_match("/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ] ?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/", $_POST['registerPostalCode']) != TRUE || empty($_POST['registerPostalCode'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>You have entered an invalid postal code.</p>";
		}
		
		//Phone Number Check
		if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['registerPhone']) != TRUE || empty($_POST['registerPhone'])) {
			$FLAG = FALSE;
			$ErrorString .= "<p>You have entered an invalid phone number.</p>";
		}
		
		if ($FLAG === TRUE) {
			mysqli_query($link, sqlStatements("INSERT", "REGISTER"));
			
			$result = mysqli_query($link, sqlStatements("SELECT", "LOGIN_REGISTER")); //Calls the function to return the login SQL script.
			//Check to see if the database call returned any rows.
			if ($row = mysqli_fetch_array($result)) {
				$_SESSION['UserID'] = $row['cust_id']; //Store the user's user name in the session.
				//Create a string that will display a dialog saying the user has logged in.
				$ScriptString = "<script>$(document).ready(function () {";
				$ScriptString .= "$('#loggedInUser').text('Thank you for signing in to Full Quiver, " . $row['f_name'] . "!'); ";
				$ScriptString .= "$('#signedInDialog').dialog('open');";
				$ScriptString .= "});";
				$ScriptString .= "</script>";
			}
		}
		else {
			$ScriptString = "<script>$(document).ready(function () {";
			$ScriptString .= "$('#failedRegister').text('You have made a few errors. Please correct them before continuing.'); ";
			$ScriptString .= "$('#errorList').html('" . $ErrorString . "');";
			$ScriptString .= "$('#failRegisterDialog').dialog('open');";
			$ScriptString .= "});";
			$ScriptString .= "</script>";
		}
		echo $ScriptString;
	}
?>