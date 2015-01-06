<!--
-------------------
Title: tutorial.php
Version: 5.0
Date: 12/04/2014
-------------------
-->

<?php
	$Title = "Full Quiver - Tutorials";
	$Page = 'Tutorials';
	include 'masterPageTop.php';
?>
			<script src="Javascript/tutorial.js"></script>
			
			<div class="tutorialHeader">
				<img src="Images/tutorialImg.png" id="TutorialImg" />
				<div class="titleButtons">
					<a href="#textTitle"><input type="button" class="needsPointer" value="Read About Bows" /></a>
					<a href="#videoTitle"><input type="button" class="needsPointer" value="Video Tutorials" /></a>
				</div>
			</div>
			
			<div id="videoTitle" class="titleLinkDiv"></div>
			<div class="YTtitle">
				<h2 class="title">Video Tutorials</h2>
				<p>This play-list of videos will help you learn to use a bow and arrow</p>
			</div>
			<br/>
			<div class="youtubeTutorialDiv">
				<iframe src="http://www.youtube.com/embed/videoseries?list=PLoIbJ0hqnOqycSZ_oHw_0Uv9Ujslk1eRL" class="youtubeTutorial" frameborder="0" allowfullscreen></iframe>
			</div>
			
			<div id="textTitle" class="titleLinkDiv"></div>
			<div class="styleTextTutorials">
				<h3 class="title">Text Tutorials</h3>
				<p>For those that prefer to read than to watch and listen </p>
			</div>
			<div class="styleTutorialMain">
				<div id="useBowTutorial">
					<a id="useBowTitle" class="needsPointer title2 headerInstruct">How to use a Bow <span class="clickMe">Click Me!</span></a>
					<div id="useBow" class="hidden tierTwoInstruc">
						<p>1. Practice holding the bow, have a sturdy but loose grip. </p>
						<p>2. Get in a balanced stance, legs shoulder width apart.</p>
						<p>3. Stand with toes facing the target.</p>
						<p>4. Now nock the arrow(put it in the bow).</p>
						<p>5. Pull the string back with your shoulder muscle not your arms.</p>
						<p>6. When doing the above step. your index finger should be above the arrow</p>
						<p>	  and the middle and ring finger below it. [see image -->]</p>
						<p>7. Release the arrow by letting go of the arrow with all three fingers(otherwise injury may occur).</p>
					</div>
				</div>
				<div class="CareMain">
					<a id="BowCare" class="needsPointer title2 headerInstruct">How to care for your Bows <span class="clickMe">Click Me!</span></a>
					<div class="hidden thing">
						<a id="bowCareWoodTitle" class="needsPointer tierTwoInstruc headerInstruct">How to care for a Wooden Bow</a>
						<div id="bowCarewood" class="hidden tierThreeInstruc">
							<p>1. Remove string of bow when not in use for long periods of time.</p>
							<p>2. Wipe bow down with wood oil a several times a year to preserve wood and finish.</p>
							<p>3. Avoid contact with water and dry bow when used in damp conditions.</p>
						</div>
					</div>
					<div class="hidden thing">
						<a id="bowCareCompoundTitle" class="needsPointer tierTwoInstruc headerInstruct">How to care for a Compound Bow</a>
						<div id="bowCareCompound" class="hidden tierThreeInstruc">
							<p>1. Apply lubricant to the cams (the wheels) if squeaking is present.</p>
							<p>2. Look for and remove dirt from moving parts.</p>
							<p>3. Wax bow string several times a year.</p>
							<p>4. Replace string every 2 years of heavy use or 3 years of light use.</p>
							<p>5. Use an Allen wrench to check the connections on the sights, arrow rest and other components several times each year as well.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="styleTutorialSide">
				<img class="tutorialPicture" id="featuredProduct" src="images/nockedarrow.gif"/>
			</div>
			
<?php
	include 'masterPageBottom.php';
?>