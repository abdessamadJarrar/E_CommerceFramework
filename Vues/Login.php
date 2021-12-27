<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sign in</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="OneTech shop project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
		<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
		<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap-datepicker.css">
		<style media="screen">
			.form-control
			{
				color:black;
			}
		</style>
	</head>

	<body>

		<div class="super_container">

			<?php require_once("header.php"); ?>

			<!-- Cart -->

			<div class="cart_section">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<div class="cart_container">
								<div class="cart_title">Sign in</div>
								<!-- content -->
								<div class="" >

									<!-- formular should be added Here -->
									<form class="" action="" method="post">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" name="email" class="form-control" id="email">
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" name="password" class="form-control" id="password">
										</div>

										<button type="submit" class="btn btn-primary">Submit</button>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php require_once("footer.php"); ?>

		</div>

		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="styles/bootstrap4/popper.js"></script>
		<script src="styles/bootstrap4/bootstrap.min.js"></script>
		<script src="plugins/greensock/TweenMax.min.js"></script>
		<script src="plugins/greensock/TimelineMax.min.js"></script>
		<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
		<script src="plugins/greensock/animation.gsap.min.js"></script>
		<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
		<script src="plugins/easing/easing.js"></script>
		<script src="js/cart_custom.js"></script>
		<script src="styles/bootstrap4/bootstrap-datepicker.js"></script>

	</body>

</html>
