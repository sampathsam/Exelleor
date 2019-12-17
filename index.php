<html>
	<body style="font-family: Raleway;">
		<?php require "header.php"; ?>
		<div id="slider" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="Images/slide-1.jpg" class="d-block w-100">
				</div>
				<div class="carousel-item">
					<img src="Images/slide-2.jpg" class="d-block w-100">
				</div>
			</div>	
			<ol class="carousel-indicators">
				<li data-target="#slider" data-slide-to="0" class="active"></li>
				<li data-target="#slider" data-slide-to="1"></li>
			</ol>		
		</div>

		<div class="container"style="padding: 20px;">
			<div class="row justify-content-center">
				<div class="col-md-5" align="center" style="border: 1px solid #eceeef; box-shadow: 2px 4px 4px 2px #969696; margin: 10px;">
					<a href="category.php?cat=Mobile Phones">
						<img src="Images/mobile-phone.jpg" width="400" height="350">
						<p style="margin-top: 10px; font-weight: bold; font-size: 20px; text-decoration: none; color: black;">Mobile Phones</p>
					</a>
				</div>
				<div class="col-md-5" align="center" style="border: 1px solid #eceeef; box-shadow: 2px 4px 4px 2px #969696; margin: 10px;">
					<a href="category.php?cat=Groceries">
						<img src="Images/Groceries.png" width="400" height="350">
						<p style="margin-top: 10px; font-weight: bold; font-size: 20px; text-decoration: none; color: black;">Groceries</p>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>