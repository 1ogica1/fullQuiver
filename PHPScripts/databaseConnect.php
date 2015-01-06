<!--
	-------------------
	Title: databaseConnect.php
	Version: 3.0
	Date: 10/30/2014
	-------------------
-->

<?php
	$link;
	function startConnection(&$link) {
		$DatabaseHost = "localhost";
		$DatabaseUserName = "root"; //Connection info for the database.
		$DatabasePassword = "";
		$Database = "fullQuiver";
		
		@$link = mysqli_connect($DatabaseHost, $DatabaseUserName, $DatabasePassword, $Database);
		//Checks to see if the database connected successfully.
		if (mysqli_connect_errno()) { //If the database didn't connect.
			$_SESSION['DatabaseConnected'] = FALSE;
		}
		else { //If the database did connect.
			$_SESSION['DatabaseConnected'] = TRUE;
		}
	}
	
	function closeConnection(&$link) {
		mysqli_close($link);
	}
?>