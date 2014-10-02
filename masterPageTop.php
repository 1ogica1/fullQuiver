<!--
-------------------
Title: masterPageTop.php
Version: 1.0
Date: 09/18/2014
-------------------
-->

<html>
	<head>
		<title><?php echo $Title; ?></title>
		<link rel="icon" type="image/jpg" href="Images/QuiverIcon.jpg">
		
		<link rel="stylesheet" href="indexCSS.css" />
		<link rel="stylesheet" href="JQueryAddons/ResponsiveSlides/responsiveslides.css" />
		<link rel="stylesheet" href="JQueryAddons/ResponsiveSlides/Paging.css" />
		
		<script src="Javascript/jquery-latest.min.js"></script>
		<script src="JQueryAddons/ResponsiveSlides/responsiveslides.js"></script>
		<?php
			if ($Page == "Products") {
				echo "<script src='Javascript/products.js'></script>";
			}
		?>
		
		<script>
			$(document).ready(function () {
					var vars = [], hash;
					var q = document.URL.split('?')[1];
					if(q != undefined){
						q = q.split('&');
						for(var i = 0; i < q.length; i++){
							hash = q[i].split('=');
							vars.push(hash[1]);
							vars[hash[0]] = hash[1];
						}
				}
			
				$(function() {
					$(".rslides").responsiveSlides({
						startidx: vars['slideshow'],
						pager: true
					});
				});
			});

		</script>
	</head>
	<body>
		<div id="content">
			<ul class="rslides">
				<li><a href="index.php?slideshow=0"><img src="Images/ArrowUp.jpg" alt="" /></a></li>
				<li><a href="index.php?slideshow=1"><img src="Images/ArrowRight.jpg" alt="" /></a></li>
				<li><a href="index.php?slideshow=2"><img src="Images/ArrowDown.jpg" alt="" /></a></li>
				<li><a href="index.php?slideshow=3"><img src="Images/ArrowLeft.jpg" alt="" /></a></li>
			</ul>
		
			<img id="logo" class="headerImage" src="Images/LogoWhite1.png"/>
			
			<div class="mainNav">
				<?php 
					$PageListName = ["Home", "Products", "Tutorials", "About Us", "Contact Us", "Account"];
					$PageURL = ["index.php", "products.php", "tutorial.php", "aboutUs.php", "contactUs.php", "account.php"];
					
					for ($i = 0; $i < count($PageListName); $i++) {
						if ($PageListName[$i] == $Page) {
							echo '<span>', $PageListName[$i], '</span>';
						}
						else {
							echo '<a href="',$PageURL[$i], '">', $PageListName[$i], '</a>';
						}
					}
				?>
			</div>
