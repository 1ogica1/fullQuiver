<!--
-------------------
Title: accountDialogs.php
Version: 5.0
Date: 12/04/2014
-------------------
-->

<?php if (isDatabaseConnected()) { ?>
<div id="loginDialog" class="accountDialogCenterText hidden"> <!--Sign In Dialog Box-->
	<img id="dialogLogo" src="images/logoBlack.png"></br>
	<div>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="fieldDiv">
				
				<div class="inputDiv">
					<input type="text" id="signInUserName" name="signInUserName" placeholder="Username" value="<?php if (isset($_POST['signInUserName'])) { echo $_POST['signInUserName']; }?>"/>
				</div>
			</div>
			
			<div class="fieldDiv">
				<div class="labelDiv">
					<label for="signInPassword">Password</label>
				</div>
				<div class="inputDiv">
					<input type="password" id="signInPassword" name="signInPassword" />
				</div>
			</div>
			
			<div class="fieldDiv">
				<div class="submitButtonDiv">
					<input class="submitInput" type="submit" name="accountLogIn" value="Sign In" />
				</div>
			</div>
		</form>
		
		<span class="needsPointer" id="newAccountOpener" style="color: white; vertical-align: bottom;">Create New Account</span>
	</div>
</div>



<div id="signUpDialog" class="accountDialogCenterText hidden"><!--Create New Account Dialog Box-->
	<img id="dialogLogo" src="images/logoBlack.png"></br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerFirstName">First Name: </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerFirstName" placeholder="Frank" name="registerFirstName" value="<?php if (isset($_POST['registerFirstName'])) { echo $_POST['registerFirstName']; }?>" />
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerLastName">Last Name: </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerLastName" placeholder="Mudold" name="registerLastName" value="<?php if (isset($_POST['registerLastName'])) { echo $_POST['registerLastName']; }?>" />
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerEmail">Email Address: </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerEmail" placeholder="Placehold@email.com" name="registerEmail" value="<?php if (isset($_POST['registerEmail'])) { echo $_POST['registerEmail']; }?>"/>
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerStreetAdd">Street Address: </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerStreetAdd" placeholder="111 Street Name" name="registerStreetAdd" value="<?php if (isset($_POST['registerStreetAdd'])) { echo $_POST['registerStreetAdd']; }?>" />
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerPostalCode">Postal Code: </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerPostalCode" placeholder="N7V 2M2" name="registerPostalCode" value="<?php if (isset($_POST['registerPostalCode'])) { echo $_POST['registerPostalCode']; }?>" />
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerCity">City: </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerCity" placeholder="Sarnia" name="registerCity" value="<?php if (isset($_POST['registerCity'])) { echo $_POST['registerCity']; }?>" />
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label>Province: </label>
			</div>
			<div class="inputDiv">
				<select id="registerProvince" name="registerProvince">
					<option value="AB">Alberta</option>
					<option value="BC">British Columbia</option>
					<option value="MB">Manitoba</option>
					<option value="NB">New Brunswick</option>
					<option value="NL">Newfoundland and Labrador</option>
					<option value="NS">Nova Scotia</option>
					<option value="ON">Ontario</option>
					<option value="PE">Prince Edward Island</option>
					<option value="QC">Quebec</option>
					<option value="SK">Saskatchewan</option>
				</select>
				<?php
					if (isset($_POST['registerProvince'])) {
						echo "<script>$('#registerProvince').val('" . $_POST['registerProvince'] . "')</script>";
					}
				?>
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerPhone">Phone Number: </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerPhone" placeholder="###-###-####" name="registerPhone" value="<?php if (isset($_POST['registerPhone'])) { echo $_POST['registerPhone']; }?>" />
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerUserName">User name: </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerUserName" placeholder="CrunchyHotDogs" name="registerUserName" value="<?php if (isset($_POST['registerUserName'])) { echo $_POST['registerUserName']; }?>" />
			</div>
		</div>
		
		<div class="fieldDivSignUp">
			<div class="labelDiv">
				<label for="registerPassword">Password: </label>
			</div>
			<div class="inputDiv">
				<input type="password" id="registerPassword" name="registerPassword" />
			</div>
		</div>
		
		
		<div class="submitButtonDiv">
			<input class="submitInput" type="submit" name="accountRegister" value="Register" />
		</div>
		
	</form>
		
	<span class="needsPointer" id="signInOpener" style="color: white; vertical-align: bottom;">Already a member? Sign In Here.</span>
</div>


<div id="signedInDialog" class="hidden" title="Signed In"><!--User Has Logged In-->
	<p id="loggedInUser" class="whiteText"></p>
</div>


<div id="failLogInDialog" class="hidden" title="Incorrect Login"><!--User Has Failed To Login-->
	<p id="failedLogIn" class="whiteText"></p>
</div>

<div id="failRegisterDialog" class="hidden" title="Registration Error"><!--User has failed to register.-->
	<p id="failedRegister" class="whiteText"></p>
	<div id="errorList" class="whiteText"></div>
</div>

<?php } else { ?>

<div id="databaseConnectErrorDialog" class="hidden" title="Database Error">
	<p>Woops! There seems to be a problem with our database! Please contact IT.</p>
	
</div>

<?php } ?>