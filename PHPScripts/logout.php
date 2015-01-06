<?php
	/*
	-------------------
	Title: masterPageTop.php
	Version: 3.0
	Date: 11/21/2014
	-------------------
	*/
	
	session_start();
	
	unset($_SESSION['UserID']);
	
	header('Location: ../index.php' . $CSSVersion);
?>