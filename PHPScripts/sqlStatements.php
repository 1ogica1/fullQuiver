<!--
-------------------
Title: sqlStatements.php
Version: 4.0
Date: 11/21/2014
-------------------
-->

<?php
	function sqlStatements($sqlType, $sqlCode) {
		$sqlReturn = "";
		if (strcmp($sqlType, "SELECT") == 0) { //SELECT STATEMENTS
			if (strcmp($sqlCode, "LOGIN") == 0) { //USER IS TRYING TO LOGIN
				$sqlReturn = "SELECT * FROM customer WHERE u_name = [UNAME] AND p_word = [PWORD] LIMIT 1";
			
				$sqlReturn = str_replace("[UNAME]", "'" . $_POST['signInUserName'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[PWORD]", "'" . $_POST['signInPassword'] . "'", $sqlReturn);
			}
			else if (strcmp($sqlCode, "LOGIN_REGISTER") == 0) {
				$sqlReturn = "SELECT * FROM customer WHERE u_name = [UNAME] AND p_word = [PWORD] LIMIT 1";
			
				$sqlReturn = str_replace("[UNAME]", "'" . $_POST['registerUserName'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[PWORD]", "'" . $_POST['registerPassword'] . "'", $sqlReturn);
			}
			else if (strcmp($sqlCode, "USEDUSER") == 0) { //USERNAME OR EMAIL IS ALREADY REGISTERED
				$sqlReturn = "SELECT * FROM customer WHERE u_name = [UNAME] LIMIT 1";
			
				$sqlReturn = str_replace("[UNAME]", "'" . $_POST['registerUserName'] . "'", $sqlReturn);
			}
			else if (strcmp($sqlCode, "USEDEMAIL") == 0) { //USERNAME OR EMAIL IS ALREADY REGISTERED
				$sqlReturn = "SELECT * FROM customer WHERE e_address = [EMAIL] LIMIT 1";
			
				$sqlReturn = str_replace("[EMAIL]", "'" . $_POST['registerEmail'] . "'", $sqlReturn);
			}
			else if (strcmp($sqlCode, "PRODUCTS") == 0) { //GETS ALL THE PRODUCTS FOR THE PRODUCTS PAGE 
				$selections = "p.product_id, p.product_name, p.supplier_id, p.skill_level, p.price, p.color, p.product_type, "; //All of the colums that will be retrieved.
				$selections .= "b.bow_style, b.weight, b.material, b.bow_range, ";
				$selections .= "q.model, q.size, ";
				$selections .= "scp.scope_diameter, scp.length, scp.magnification, ";
				$selections .= "std.height, ";
				$selections .= "strng.string_style, strng.strand_count";
				
				$sqlReturn = "SELECT " . $selections . " FROM product p "; //The select statement.
				$sqlReturn .= "LEFT JOIN bow b ON p.product_id = b.product_id ";
				$sqlReturn .= "LEFT JOIN quiver q ON p.product_id = q.product_id ";
				$sqlReturn .= "LEFT JOIN scope scp ON p.product_id = scp.product_id ";
				$sqlReturn .= "LEFT JOIN stand std ON p.product_id = std.product_id ";
				$sqlReturn .= "LEFT JOIN string strng ON p.product_id = strng.product_id ";
				$sqlReturn .= "ORDER BY product_id, product_name";
			}
			else if (strcmp($sqlCode, "ACCOUNTPAGENAME") == 0) {
				$sqlReturn = "SELECT f_name FROM customer WHERE cust_id = " . $_SESSION['UserID'];
			}
			else if (strcmp($sqlCode, "USER OLD PASSWORD") == 0) {
				$sqlReturn = "SELECT p_word FROM customer WHERE cust_id = " . $_SESSION['UserID'];
			}
			else if (strcmp($sqlCode, "USER ORDERS") == 0) {
				$sqlReturn = "SELECT ot.order_id, ot.date_placed FROM order_table ot JOIN order_customer oc ON oc.order_id = ot.order_id WHERE oc.cust_id = " . $_SESSION['UserID'];
			}
			else if (strcmp($sqlCode, "COMPLETE ORDER") == 0) {
				$sqlReturn = "SELECT p.product_id, p.product_name, p.price, op.quantity FROM order_product op JOIN product p ON op.product_id = p.product_id WHERE order_id = " . $_GET['order'];			
			}
			else if (strcmp($sqlCode, "IS RIGHT ORDER") == 0) {
				$sqlReturn = "SELECT * FROM order_customer WHERE cust_id = " . $_SESSION['UserID'] . " AND order_id = " . $_GET['order'];
			}
			else if (strcmp($sqlCode, "ORDER HAS ACCOUNT") == 0) {
				$sqlReturn = "SELECT * FROM order_customer WHERE order_id = " . $_GET['order'];
			}
		}
		
		
		else if (strcmp($sqlType, "INSERT") == 0) { //INSERT STATEMENTS
			if (strcmp($sqlCode, "REGISTER") == 0) {
				$sqlReturn = "INSERT INTO customer (class, f_name, l_name, e_address, street_add, postal_code, city, province, phone_num, u_name, p_word) VALUES ([CLASS], [FNAME], [LNAME], [EMAIL], [STREET], [POSTAL], [CITY], [PROVINCE], [PHONE], [UNAME], [PWORD])";
				
				$sqlReturn = str_replace("[CLASS]", "'USER'", $sqlReturn);
				$sqlReturn = str_replace("[FNAME]", "'" . $_POST['registerFirstName'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[LNAME]", "'" . $_POST['registerLastName'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[EMAIL]", "'" . $_POST['registerEmail'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[STREET]", "'" . $_POST['registerStreetAdd'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[POSTAL]", "'" . $_POST['registerPostalCode'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[CITY]", "'" . $_POST['registerCity'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[PROVINCE]", "'" . $_POST['registerProvince'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[PHONE]", "'" . $_POST['registerPhone'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[UNAME]", "'" . $_POST['registerUserName'] . "'", $sqlReturn);
				$sqlReturn = str_replace("[PWORD]", "'" . $_POST['registerPassword'] . "'", $sqlReturn);				
			}
		}
		
		
		else if (strcmp($sqlType, "UPDATE") == 0) { // UPDATE PASSWORD
			if (strcmp($sqlCode, "UPDATE PASSWORD") == 0) {
				$sqlReturn = "UPDATE customer SET p_word = [PASSWORD] WHERE cust_id = " . $_SESSION['UserID'];
				
				$sqlReturn = str_replace("[PASSWORD]", "'" . $_POST['pWord'] . "'", $sqlReturn);
			}
			else if (strcmp($sqlCode, "UPDATE EMAIL") == 0) {
				$sqlReturn = "UPDATE customer SET e_address = [EMAIL] WHERE cust_id = " . $_SESSION['UserID'];
				
				$sqlReturn = str_replace("[EMAIL]", "'" . $_POST['eAddress'] . "'", $sqlReturn);
			}
			
		}
		
		return $sqlReturn;
	}
	
	function sqlStatementsFilter($productType, $productColumn, $queryNumber) { //SQL statements that directly influence the filters on the product page.
		if ($queryNumber === 0) {
			if (strcmp($productColumn, "size") != 0) { //Order size differently so it reads {S, M, L} instead of {L, M, S}
				$sqlReturn = "SELECT DISTINCT " . $productColumn . " FROM " . $productType . " ORDER BY " . $productColumn;
			}
			else {
				$sqlReturn = "SELECT DISTINCT " . $productColumn . " FROM " . $productType . " ORDER BY " . $productColumn . " DESC";
			}
		}
		else if ($queryNumber === 1) { //Retrieve the columns for each product.
			$sqlReturn = "SHOW COLUMNS FROM " . $productType;
		}
		
		return $sqlReturn;
	}
	
	function sqlStatementsCheckOut($productId, $quantity, $queryNumber, $lastInserted) {
		if ($queryNumber == 0) {
			$sqlReturn = "SELECT * FROM product WHERE product_id = " . $productId;
		}
		else if ($queryNumber == 1) {
			$sqlReturn = "INSERT INTO `fullquiver`.`order_table` (`order_id`, `date_placed`) VALUES (NULL, '" . date("Y-m-d") . "')";
		}
		else if ($queryNumber == 2) {
			$sqlReturn = "INSERT INTO order_product VALUES (" . $lastInserted . ", " . $productId . ", " . $quantity . ")";
		}
		else if ($queryNumber == 3) {
			$sqlReturn = "INSERT INTO `fullquiver`.`order_customer` (`order_id`, `cust_id`) VALUES (" . $lastInserted . ", " . $_SESSION['UserID'] . ")";
		}
		return $sqlReturn;
	}
?>