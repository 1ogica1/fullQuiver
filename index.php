<!--
-------------------
Title: index.html
Version: 1.0
Date: 09/17/2014
-------------------
-->
<?php

	$Title = "Full Quiver";
	$Page = "Home";
	include 'masterPageTop.php';
?>			
			<div class="style1Main">
				<div id="aboutUsDiv">
					<h2>Who We Are</h2>
					<p>
						We are Full Quiver, an archery resale store. We sell all the goods you could ever need regarding archery.
					</p>
					<p>
						Currently we sell:
						<ul>
							<li>Bows</li>
							<li>Quivers</li>
							<li>Arrows</li>
							<li>Stands</li>
							<li>Scopes</li>
						</ul>
					</p>
					<p>
						Visit our <a href="aboutUs.php">About Us</a> page to read about our company!
					</p>
				</div>
			</div>
			
			<div class="style1Side">
				<h2>Featured Products</h2>
				<div>
					<img id="featuredProduct1" class="featuredImage" src="Images/200x200.jpg"/> </br>
					Click to see more on <a href="product.html">SALE!</a>
				</div>
				<div>
					<img id="featuredProduct2" class="featuredImage" src="Images/200x200.jpg"/> </br>
					Click to see more <a href="product.html">FEATURED PRODUCTS!</a>
				</div>
			</div>
			
			<?php
				include 'masterPageBottom.php';
			?>