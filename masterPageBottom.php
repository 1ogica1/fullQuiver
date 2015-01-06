<!--
-------------------
Title: masterPageBottom.php
Version: 5.0
Date: 12/04/2014
-------------------
-->

			<div class="clear"></div>
			
		</div>
	</body>
	<footer>
		<div id="footerText" class="footerText">
			<p>&copy; 2014 Full Quiver All Rights Reserved.</p>
		</div>
		<a href="#top"><img id="toTop" src="Images/toTop.jpg"></a>	<div class="clear"></div>
	
	</footer>
</html>

<?php
	if (isDatabaseConnected()) {
		closeConnection($link); //Closes the database connection. Location: PHPScripts/databaseConnect.php
	}
?>