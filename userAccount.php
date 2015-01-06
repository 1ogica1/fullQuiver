<!--
-------------------
Title: userAccount.php
Version: 4.0
Date: 12/04/2014
-------------------
-->

<?php
	$Title = 'Full Quiver - Account';
	$Page = 'Account';
	include 'masterPageTop.php';
?>
<div id="userAccountContent">

	<img id="archer" src="Images/userAccountArcher.jpg"></img>

	<?php
		if (isDatabaseConnected()) {
			$result = mysqli_query($link, sqlStatements("SELECT", "ACCOUNTPAGENAME"));
			$row = mysqli_fetch_array($result);
			echo "Welcome, <strong>" . $row['f_name'] . "</strong>!";
			
			if (isset($_POST['submitPassword'])) {
				$result = mysqli_query($link, sqlStatements("SELECT", "USER OLD PASSWORD"));
				$row = mysqli_fetch_array($result);
				
				if (strcmp($row['p_word'], $_POST['pWordCurrent']) == 0) {
					if (strcmp($_POST['pWord'], $_POST['pWordConfirm']) == 0) {
						mysqli_query($link, sqlStatements("UPDATE", "UPDATE PASSWORD"));
						echo "<p>Password has successfully been changed.</p>";
					}
					else {
						echo "<p>Your passwords do not match.</p>";
					}
				}
				else {
					echo "<p>You have entered your current password incorrectly.</p>";
				}
			}
			else if (isset($_POST['submitEmail'])) {
				mysqli_query($link, sqlStatements("UPDATE", "UPDATE EMAIL"));
				echo "<p>Email has successfully been changed.</p>";
			}
		}
	?>

	<br/><br/><br/>
	
	<a id="changeInfoButton" class="needsPointer">Change Account Information</a>
	<p class="def">Change your account password and email address.</p>
	
	<div class="hidden" id="infoChange">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<label>Current Password:</label>
			<br/>
			<input type="password" name="pWordCurrent" />
			<br/>
			
			<label>New Password:</label>
			<br/>
			<input type="password" name="pWord" />
			<br/>
			
			<label>Confirm Password:</label>
			<br/>
			<input type="password" name="pWordConfirm" />
			<input type="submit" value="&check;" name="submitPassword" />
				
			<br/>
			<br/>
			
			<label>New Email Address:</label><br/>
			<input type="text" name="eAddress" />
			<input type="submit" value="&check;" name="submitEmail" />
		</form>
	</div>
	<br/>

	<a id="displayOrderHistory" class="needsPointer">Order History</a>
	<p class="def">View previous orders and most frequent purchases for easy re-order.</p>
	<div id="orderHistory" class="hidden">
	<?php
		$HTMLString = "";
		
		if (isDatabaseConnected()) {
			$result = mysqli_query($link, sqlStatements("SELECT", "USER ORDERS"));
			$OrderFLAG = FALSE;
			
			while ($row = mysqli_fetch_array($result)) {
				$HTMLString .= "<a target='_blank' href='orderDisplay.php?order=" . $row['order_id'] . "'>Order # " . $row['order_id'] . "</a> - <span class='dateItalic'>" . $row['date_placed'] . "</span><br/>";
				$OrderFLAG = TRUE;
			}
			
			if ($OrderFLAG == FALSE) {
				$HTMLString .= "<p>Currently No Orders</p>";
			}
			echo $HTMLString;
		}
	?>
	</div>
	
	<br/><br/><br/>

	<a href="PHPScripts/logout.php"><button>Logout</button></a>
</div>

<?php
	include 'masterPageBottom.php';
?>