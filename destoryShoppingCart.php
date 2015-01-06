<!--
-------------------
Title: destoryShoppingCart.php
Version: 1.0
Date: 12/04/2014
-------------------
-->

<?php
	session_start();
	unset($_SESSION['itemsInCart']); //Clear the shopping cart.
	unset($_SESSION['amountInShoppingCart']); //Clear the number of items in the shopping cart.
?>