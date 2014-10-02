<!--
-------------------
Title: account.html
Version: 1.0
Date: 09/17/2014
-------------------
-->

<?php
	$Title = 'Full Quiver - Account';
	$Page = 'Account';
	include 'masterPageTop.php';
?>

			
			</br>
			</br>
			</br>
			
			<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC"> 
				<tr> 
					<form name="form1" method="post" action="newaccount.php"> 
						<td> 
							<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF"> 
								<tr> 
									<td colspan="3"><strong>Register </strong></td> 
								</tr> 
								<tr> 
									<td width="78">Username</td> 
									<td width="6">:</td> 
									<td width="294"><input name="username" type="text" id="username"></td> 
								</tr> 
								<tr> 
									<td>Password</td> 
									<td>:</td> 
									<td><input name="password" type="text" id="password"></td> 
								</tr> 
								<tr> 
									<td>&nbsp;</td> 
									<td>&nbsp;</td> 
									<td><input type="submit" name="Submit" value="create"></td> 
								</tr> 
							</table> 
						</td> 
					</form> 
				</tr>
			</table>
	
			<?php
				include 'masterPageBottom.php';
			?>	