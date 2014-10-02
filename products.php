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
					<div>
						<a id="productsFilter">Products</a>
						<div id="productFilterOptions">
							
							<div style="display: inline-block; width: 40%;">
								<label>Bows </label>
							</div>
							<div style="display: inline-block; width: 20%;">
								<input id="" type="checkbox" />
							</div>
						
						
							<div style="display: inline-block; width: 40%;">
								<label>Gear </label>
							</div>
							<div style="display: inline-block; width: 20%;">
								<input type="checkbox" />
							</div>
							
							
							<div style="display: inline-block; width: 40%;">
								<label>Stands </label>
							</div>
							<div style="display: inline-block; width: 20%;">
								<input type="checkbox" />
							</div>
							
							
							<div style="display: inline-block; width: 40%;">
								<label>Scopes </label>
							</div>
							<div style="display: inline-block; width: 20%;">
								<input type="checkbox" />
							</div>
							
							
							<div style="display: inline-block; width: 40%;">
								<label>Quivers </label>
							</div>
							<div style="display: inline-block; width: 20%;">
								<input type="checkbox" />
							</div>
						</div>
					</div>
					
					<br />
					
					<div>
						<a id="gearsFilter">Color</a>
						<div style="display:none;" id="gearFilterOptions">
							<label>Blue </label>
							<input type="checkbox" />
							
							<br />
							<label>Green </label>
							<input type="checkbox" />
						</div>
					</div>
					
					<br />
					
					<div style="display: none;" id="divRange">
						<a id="rangeFilter">Range</a>
						<div style="display:none;" id="rangeFilterOptions">
							<label>5 yards </label>
							<input id="fiveYards" type="checkbox" />
							
							<br />
							<label>200 yards </label>
							<input id="twoHundredYards" type="checkbox" />
						</div>
					</div>
				</div>
			</div>
			
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
			</div>
			
<?php
	include 'masterPageBottom.php';
?>