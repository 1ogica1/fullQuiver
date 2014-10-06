<!--
-------------------
Title: product.html
Version: 1.0
Date: 09/17/2014
-------------------
-->

<?php
	$Title = 'Full Quiver - Products';
	$Page = 'Products';
	include 'masterPageTop.php';
?>
			
			<div class="style2Side">
				<p>Filters</p>
				<div id="filterDiv">
					<!--Product Filter-->
					<div>
						<a id="productsFilter">Products</a>
						<div id="productsFilterOptions">
							
							<div class="filterLabel">
								<label>Bows </label>
							</div>
							<div class="filterCheckBox">
								<input id="bowCheckBox" type="checkbox" />
							</div>
						
						
							<div class="filterLabel">
								<label>Gear </label>
							</div>
							<div class="filterCheckBox">
								<input id="gearCheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Quivers </label>
							</div>
							<div class="filterCheckBox">
								<input id="quiverCheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Scopes </label>
							</div>
							<div class="filterCheckBox">
								<input id="scopeCheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Stands </label>
							</div>
							<div class="filterCheckBox">
								<input id="standCheckBox" type="checkbox" />
							</div>
						</div>
					</div>
					<!--End Product Filter-->
					
					<br />
					
					<!--Filters For All Products-->
					<!--Color-->
					<div>
						<a id="colorFilter">Color</a>
						<div id="colorFilterOptions">
							<div class="filterLabel">
								<label>Green </label>
							</div>
							<div class="filterCheckBox">
								<input id="greenCheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Blue </label>
							</div>
							<div class="filterCheckBox">
								<input id="blueCheckBox" type="checkbox" />
							</div>
						</div>
					</div>
					
					<br />
					
					<!--Manufacturer-->
					<div>
						<a id="manufacturerFilter">Manufacturer</a>
						<div id="manufacturerFilterOptions">
							<div class="filterLabel">
								<label>Bows R Us </label>
							</div>
							<div class="filterCheckBox">
								<input id="bowsRUsCheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>Lancaster </label>
							</div>
							<div class="filterCheckBox">
								<input id="lanchesterCheckBox" type="checkbox" />
							</div>
						</div>
					</div>
					
					<br />
					
					<!--Price Ranges-->
					<div>
						<a id="priceRangeFilter">Price Range</a>
						<div id="priceRangeFilterOptions">
							<div class="filterLabel">
								<label>$0 - $25 </label>
							</div>
							<div class="filterCheckBox">
								<input id="price0To25CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>$25 - $50 </label>
							</div>
							<div class="filterCheckBox">
								<input id="price25To50CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>$50 - $75 </label>
							</div>
							<div class="filterCheckBox">
								<input id="price50To75CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>$75 - $100 </label>
							</div>
							<div class="filterCheckBox">
								<input id="price75To100CheckBox" type="checkbox" />
							</div>
						</div>
					</div>
					
					<br />
					
					<!--Skill Level-->
					<div>
						<a id="skillLevelFilter">Skill Level</a>
						<div id="skillLevelFilterOptions">
							<div class="filterLabel">
								<label>0 </label>
							</div>
							<div class="filterCheckBox">
								<input id="skill0CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>1 </label>
							</div>
							<div class="filterCheckBox">
								<input id="skill1CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>2 </label>
							</div>
							<div class="filterCheckBox">
								<input id="skill2CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>3 </label>
							</div>
							<div class="filterCheckBox">
								<input id="skill3CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>4 </label>
							</div>
							<div class="filterCheckBox">
								<input id="skill4CheckBox" type="checkbox" />
							</div>
							
							
							<div class="filterLabel">
								<label>5 </label>
							</div>
							<div class="filterCheckBox">
								<input id="skill5CheckBox" type="checkbox" />
							</div>
						</div>
					</div>
					<!--End Filter For All Products-->
					
					<br />
					
					<!--Bow Specific Filters-->
					<div class="hidden" id="divBowFilters">
						<!--Bow Material-->
						<div id="divBowMaterial">
							<a id="bowMaterialFilter">Bow Material</a>
							<div id="bowMaterialFilterOptions">
								<div class="filterLabel">
									<label>Wood </label>
								</div>
								<div class="filterCheckBox">
									<input id="woodCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>Plastic </label>
								</div>
								<div class="filterCheckBox">
									<input id="plasticCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						
						<br />
						
						
						<!--Bow Ranges-->
						<div id="divBowRange">
							<a id="rangeFilter">Bow Range</a>
							<div id="rangeFilterOptions">
								<div class="filterLabel">
									<label>25 Yards </label>
								</div>
								<div class="filterCheckBox">
									<input id="twentyFiveYardCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>50 Yards </label>
								</div>
								<div class="filterCheckBox">
									<input id="fiftyYardCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						
						<br />
					
						<!--Bow Styles-->
						<div id="divBowStyle">
							<a id="bowStyleFilter">Bow Styles</a>
							<div id="bowStyleFilterOptions">
								<div class="filterLabel">
									<label>Recurve </label>
								</div>
								<div class="filterCheckBox">
									<input id="RecurveCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>Longbow </label>
								</div>
								<div class="filterCheckBox">
									<input id="longBowCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						
						<br />
						
						<!--Bow Weights-->
						<div id="divBowWeight">
							<a id="bowWeightFilter">Bow Weights</a>
							<div id="bowWeightFilterOptions">
								<div class="filterLabel">
									<label>5 Pounds </label>
								</div>
								<div class="filterCheckBox">
									<input id="fivePoundsBowCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>10 Pounds </label>
								</div>
								<div class="filterCheckBox">
									<input id="tenPoundsBowlongBowCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						
						<br />
					</div>
					<!--End Of Bow Specific Filters-->
					
					<!--Gear Specific Filters-->
					<div class="hidden" id="divGearFilters">
						<!--Gear Gender-->
						<div id="divGearGender">
							<a id="gearGenderFilter">Gear Gender Pref</a>
							<div id="gearGenderFilterOptions">
								<div class="filterLabel">
									<label>Female </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearFemaleCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>Male </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearMaleCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						
						<br />
						
						<!--Gear Model-->
						<div id="divGearModel">
							<a id="gearModelFilter">Gear Model</a>
							<div id="gearModelFilterOptions">
								<div class="filterLabel">
									<label>2 Finger </label>
								</div>
								<div class="filterCheckBox">
									<input id="gear2FingerCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>3 Finger </label>
								</div>
								<div class="filterCheckBox">
									<input id="gear3FingerCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						
						<br />
						
						<!--Gear Size-->
						<div id="divGearSize">
							<a id="gearSizeFilter">Gear Size</a>
							<div id="gearSizeFilterOptions">
								<div class="filterLabel">
									<label>Small </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearSmallCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>Medium </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearMediumCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>Large </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearLargeCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						
						<br />
						
						<!--Gear Style-->
						<div id="divGearStyle">
							<a id="gearStyleFilter">Gear Style</a>
							<div id="gearStyleFilterOptions">
								<div class="filterLabel">
									<label>Leather </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearStyleLeatherCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>Plastic </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearStylePlasticCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>Metal </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearStlyeMetalCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						
						<br />
						
						<!--Gear Type-->
						<div id="divGearType">
							<a id="gearTypeFilter">Gear Type</a>
							<div id="gearTypeFilterOptions">
								<div class="filterLabel">
									<label>Glove </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearGloveCheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>Armguard </label>
								</div>
								<div class="filterCheckBox">
									<input id="gearArmguardCheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						<br />
					</div>
					<!--End of Gear Specific Filters-->
					
					<!--Quiver Specific Filters-->
					<div class="hidden" id="divQuiverFilters">
						<!--Quiver Size-->
						<div id="divQuiverSize">
							<a id="quiverSizeFilter">Quiver Size</a>
							<div id="quiverSizeFilterOptions">
								<div class="filterLabel">
									<label>3 Arrows </label>
								</div>
								<div class="filterCheckBox">
									<input id="quiverSize3CheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>6 Arrows </label>
								</div>
								<div class="filterCheckBox">
									<input id="quiverSize6CheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						<br />
					</div>
					<!--End of Quiver Specific Filters-->
					
					<!--Scope Specific Filters-->
					<div class="hidden" id="divScopeFilters">
						<!--Scope Diameter-->
						<div id="divScopeDiameter">
							<a id="scopeDiameterFilter">Scope Diameter</a>
							<div id="scopeDiameterFilterOptions">
								<div class="filterLabel">
									<label>.010" </label>
								</div>
								<div class="filterCheckBox">
									<input id="scopeDiameter010CheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>0.20" </label>
								</div>
								<div class="filterCheckBox">
									<input id="scopeDiameter020CheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						<br />
						
						<!--Scope Length-->
						<div id="divScopeLength">
							<a id="scopeLengthFilter">Scope Length</a>
							<div id="scopeLengthFilterOptions">
								<div class="filterLabel">
									<label>6" </label>
								</div>
								<div class="filterCheckBox">
									<input id="scopeLength6CheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>9" </label>
								</div>
								<div class="filterCheckBox">
									<input id="scopeLength9CheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						<br />
						
						<!--Scope Magnification-->
						<div id="divScopeMagnification">
							<a id="scopeMagnificationFilter">Scope Magnification</a>
							<div id="scopeMagnificationFilterOptions">
								<div class="filterLabel">
									<label>0X </label>
								</div>
								<div class="filterCheckBox">
									<input id="scopeMagnification0CheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>2X </label>
								</div>
								<div class="filterCheckBox">
									<input id="scopeMagnification2CheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						<br />
						
						<!--Scope Sight Style-->
						<div id="divScopeSightStyle">
							<a id="scopeSightStyleFilter">Scope Sight Style</a>
							<div id="scopeSightStyleFilterOptions">
								<div class="filterLabel">
									<label>3 Pin </label>
								</div>
								<div class="filterCheckBox">
									<input id="scopeSightStyle3CheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>4 Pin </label>
								</div>
								<div class="filterCheckBox">
									<input id="scopeSightStyle4CheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						<br />
					</div>
					<!--End of Scope Specific Filters-->
					
					<!--Stand Specific Filters-->
					<div class="hidden" id="divStandFilters">
						<!--Stand Height-->
						<div id="divStandHeight">
							<a id="standHeightFilter">Stand Height</a>
							<div id="standHeightFilterOptions">
								<div class="filterLabel">
									<label>50" </label>
								</div>
								<div class="filterCheckBox">
									<input id="standHeight50CheckBox" type="checkbox" />
								</div>
								
								
								<div class="filterLabel">
									<label>60" </label>
								</div>
								<div class="filterCheckBox">
									<input id="standHeight60CheckBox" type="checkbox" />
								</div>
							</div>
						</div>
						<br />
					</div>
					<!--End of Stand Specific Filters-->
				</div>
			</div>
			
			<div class="style2Main">
				<div class="productName">
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
					
					<div class="productCell">
						<img class="productImage" src="Images/150x150.jpg" />
						<p><strong>Product Name</strong> $000.00</p>
					</div>
				</div>
			</div>
			
			<!--<br />
			
			<div class="style2Main">
				<br />
				<table id="productsTable" class="productName">
					<tbody>
						<tr>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
							<td>
								<div>
									<img class="productImage" src="Images/150x150.jpg"/>
									<p><strong>Product Name</strong> $000.00</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>-->
			
<?php
	include 'masterPageBottom.php';
?>