<!--
-------------------
Title: index.php
Version: 5.0
Date: 12/04/2014
-------------------
-->
<?php
	$Title = "Full Quiver";
	$Page = "Home";
	include 'masterPageTop.php';
?>			

			<ul class="bxslider">
				<li><a href="http://localhost/fullQuiver/products.php?product_type=bow&bow_style=long"><img src="Images/slide1.png" class="sliderImage" alt="" /></a></li>
				<li><img src="Images/slide2.png" class="sliderImage" alt="" /></li>
				<li><a href="http://www.medievalarchery.com/" target="blank"><img src="Images/slide3.png" class="sliderImage" alt="" /></a></li>
			</ul>
			
			<img id="indexImage" src="Images/indexImage.png">
			
			<div class="clear quoteParagraph">
				<p class="paragraph">For even as He loves the arrow that flies, so He also loves the bow that is stable.</p>
				<p class="author">Khali Gibran</p>
				<br/>
				<p class="paragraph">If you would hit the mark, you must aim a little above it:</p>
				<p class="paragraph"> Every arrow that flies feels the pull of the earth.</p>
				<p class="author">Henry Wadsworth Longfellow</p>
				<br/>
				<p class="paragraph">Thought is the arrow of time; memory never fades. What was asked is given; the price is paid.</p>
				<p class="author">Robert Jordan</p>
				<br/>
			</div>
			
			<img id="featuredProductsImg" src="Images/featuredProductsImg.png">
			<div class="styleIndexSide">
				<div class="featuredProductContainer">
					<div class="featuredProductDiv">
						<a href="products.php?product_type=bow"><img class="featuredImage" src="Images/Products/Thumbnail/1.png"/></a> </br>
						<strong>Conquest 04</strong></br>
						$63.63
					</div>
					<div class="featuredProductDiv">
						<a href="products.php?product_type=stand"><img class="featuredImage" src="Images/Products/Thumbnail/30.png"/></a> </br>
						<strong>Bow and Arrow Rack</strong></br>
						$36.71
					</div>
					<div class="featuredProductDiv">
						<a href="products.php?product_type=quiver"><img class="featuredImage" src="Images/Products/Thumbnail/13.png"/></a> </br>
						<strong>Old Style Quiver</strong></br>
						$97.05
					</div>
				</div>
			</div>
			
			<div class="clear"></div>
			
			<?php
				include 'masterPageBottom.php';
			?>