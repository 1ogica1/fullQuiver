<div id="loginDialog" title="Account Login"> <!--Sign In Dialog Box-->
	<div>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="hidden" value="SIGNIN" name="submitType"/>
			<div class="fieldDiv">
				<div class="labelDiv">
					<label for="signInUserName">User name : </label>
				</div>
				<div class="inputDiv">
					<input type="text" id="signInUserName" name="signInUserName" />
				</div>
			</div>
			
			<div class="fieldDiv">
				<div class="labelDiv">
					<label for="signInPassword">Password : </label>
				</div>
				<div class="inputDiv">
					<input type="password" id="signInPassword" name="signInPassword" />
				</div>
			</div>
			
			<div class="fieldDiv">
				<div class="submitButtonDiv">
					<input type="submit" name="Submit" value="Sign In" />
				</div>
			</div>
		</form>
		
		<span id="newAccountOpener" style="color: white; position: absolute; bottom: 10px;">Create New Account</span>
	</div>
</div>



<div id="signUpDialog" title="Account Sign up"><!--Create New Account Dialog Box-->
	<form>
		<input type="hidden" value="REGISTER" name="submitType"/>
		<div class="fieldDiv">
			<div class="labelDiv">
				<label for="registerFirstName">First Name : </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerFirstName" name="registerFirstName" />
			</div>
		</div>
		
		<div class="fieldDiv">
			<div class="labelDiv">
				<label for="registerLastName">Last Name : </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerLastName" name="registerLastName" />
			</div>
		</div>
		
		<div class="fieldDiv">
			<div class="labelDiv">
				<label for="registerEmail">Email Address : </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerEmail" name="registerEmail" />
			</div>
		</div>
		
		<div class="fieldDiv">
			<div class="labelDiv">
				<label for="registerUserName">User name : </label>
			</div>
			<div class="inputDiv">
				<input type="text" id="registerUserName" name="registerUserName" />
			</div>
		</div>
		
		<div class="fieldDiv">
			<div class="labelDiv">
				<label for="registerPassword">Password : </label>
			</div>
			<div class="inputDiv">
				<input type="password" id="registerPassword" name="registerPassword" />
			</div>
		</div>
		
		<div class="fieldDiv">
				<div class="submitButtonDiv">
					<input type="submit" value="Register" />
				</div>
			</div>
	</form>
		
	<span id="signInOpener" style="color: white; position: absolute; bottom: 10px;">Already a member? Sign In Here.</span>
</div>


<div id="signedInDialog" title="Signed In"><!--User Has Logged In-->
	<p id="loggedInUser" class="whiteText"></p>
</div>


<div id="failLogInDialog" title="Incorrect Login"><!--User Has Failed To Login-->
	<p id="failedLogIn" class="whiteText"></p>
</div>