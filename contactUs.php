<!--
-------------------
Title: contactUs.html
Version: 1.0
Date: 09/17/2014
-------------------
-->

<?php 
	$Title = "Full Quiver - Contact Us";
	$Page = "Contact Us";
	include 'masterPageTop.php';
?>

			</br>
			</br>
			</br>
		    
			<div id="contactUsDiv">
				<form name="contactUsForm" method="post">
					<fieldset class="noBorderFieldset">
						<legend>Contact Information</legend>
						
						<div class="fieldDiv">
							<div class="labelDiv">
								<label for="firstName">First Name : </label>
							</div>
							<div class="inputDiv">
								<input type="text" id="firstName" name="firstName" />
							</div>
						</div>
						
						<div class="fieldDiv">
							<div class="labelDiv">
								<label for="lastName">Last Name : </label>
							</div>
							<div class="inputDiv">
								<input type="text" id="lastName" name="lastName" />
							</div>
						</div>
						
						<div class="fieldDiv">
							<div class="labelDiv">
								<label for="phoneNumber">Phone Number : </label>
							</div>
							<div class="inputDiv">
								<input type="text" id="phoneNumber" name="phoneNumber" />
							</div>
						</div>
						
						<div class="fieldDiv">
							<div class="labelDiv">
								<label>Province : </label>
							</div>
							<div class="inputDiv">
								<select>
									<option>Alberta</option>
									<option>British Columbia</option>
									<option>Manitoba</option>
									<option>New Brunswick</option>
									<option>Newfoundland and Labrador</option>
									<option>Nova Scotia</option>
									<option>Ontario</option>
									<option>Prince Edward Island</option>
									<option>Quebec</option>
									<option>Saskatchewan</option>
								</select>
							</div>
						</div>
						
						<div class="fieldDiv">
							<div class="labelDiv">
								<label for="city">City : </label>
							</div>
							<div class="inputDiv">
								<input type="text" id="city" name="city" />
							</div>
						</div>
						
						<div class="fieldDiv">
							<div class="labelDiv">
								<label for="streetAddress">Street Address : </label>
							</div>
							<div class="inputDiv">
								<input type="text" id="streetAddress" name="streetAddress" />
							</div>
						</div>
					</fieldset>
					
					<fieldset class="noBorderFieldset">
						<legend>Comments</legend>
						
						<div class="fieldDiv">
							<div class="commentDiv">
								<textarea maxlength="450"></textarea>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			
			<?php
				include 'masterPageBottom.php';
			?>