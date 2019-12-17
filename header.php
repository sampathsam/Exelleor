<?php session_start(); ?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	</head>
	<body>
		<div style="padding: 20px;; background-color: purple; ">
				<a href="/application" style="text-decoration:none; font-family: Raleway; font-size: 23px; font-weight: bold; color: #ffffff; margin-left: 10px;">EXELLEOR</a>

				<?php 
				$conn = mysqli_connect('localhost', 'root', 'sam', 'test');
				
				 ?>

				<?php if(!isset($_SESSION['email'])):?>
					<a href="" class="header-options" data-target="#register" data-toggle="modal"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
					<a href="#" class="header-options" data-target="#register" data-toggle="modal">SIGNUP</a>
				<?php else :
					$query = "SELECT * from cartitems WHERE user='".$_SESSION['email']."'";
					$result = mysqli_query($conn, $query);
					
					$count = mysqli_num_rows($result);
					
					?>
					
					<a href="cart.php" class="header-options"><?php echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>'.' '. $count; ?> </a>
					<a href="logout.php" class="header-options">LOGOUT</a>
				<?php endif?>
				<a href="/application" class="header-options">CATEGORIES</a>
				<a href="/application" class="header-options">HOME</a>
				</div>
				<div class="modal fade" id="register" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Registration</h4>
								<a class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </a>
							</div>
							<div class="modal-body">
							<form method="post" action="validation.php">
								<div class="form-group">
									<label for="email">Email:</label>
									<input type="email" name="email" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="pass">Password:</label>
									<input type="password" name="pass" class="form-control"/>
								</div>
								<button type="submit" name="register" class="btn btn-primary">Register</button>
							</form>
							<a href="" data-target="#signin" data-toggle="modal" data-dismiss="modal">Already have an account? Signin here</a>
						</div>
						
			</div>
		</div>
		</div>
		<div class="modal fade" id="signin" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Sign In</h4>
								<a class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </a>
							</div>
						<div class="modal-body">	
							<form method="post" action="validation.php">
								<div class="form-group">
									<label for="email">Email:</label>
									<input type="email" name="email" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="pass">Password:</label>
									<input type="password" name="pass" class="form-control"/>
								</div>
								<button type="submit" name="signin" class="btn btn-primary">Sign In</button>
							</form>
							<a href="" data-target="#register" data-toggle="modal" data-dismiss="modal">Don't have an account? click here</a>
					
							</div>
							
						</div>
					</div>
				</div>
			</body>
		</html>