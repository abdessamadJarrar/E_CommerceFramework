<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register</title>
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
			<?php if(isset($_POST["submit"]))
			{
				require_once("../controller/Main_Controller.php");
				$result = register($_POST);
				echo "<h1>$result</h1>";
			}
			else {?>
				<div class="cart_section">
					<div class="container">
						<div class="row">
							<div class="col-lg-10 offset-lg-1">
								<div class="cart_container">
									<div class="cart_title">Register</div>
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
											<div class="form-group">
												<label for="password_confirm">Confirm Password</label>
												<input type="password" name="password_confirm" class="form-control" id="password_confirm">
											</div>
											<div class="form-group">
												<label for="first_name">First Name</label>
												<input type="text" name="first_name" class="form-control" id="first_name">
											</div>
											<div class="form-group">
												<label for="last_name">Last Name</label>
												<input type="last_name" name="last_name" class="form-control" id="last_name">
											</div>
											<div class="form-group">
												<label for="sexe">sexe</label>
												<select id="sexe" name="sexe"class="custom-select w-100 ml-0">
									        <option class="" value="m">Male</option>
									        <option value="f">Female</option>
									      </select>
											</div>
											<div class="form-group">
												<label for="country">Country</label>
												<select id="country" name="country" class="custom-select w-100 ml-0">
									      </select>
											</div>
											<div class="form-group">
												<label for="city">City</label>
												<select id="city" name="city" class="custom-select w-100 ml-0">
									      </select>
											</div>
											<div class="form-group">
												<label for="tel">Phone Number</label>
												<input type="tel" name="phone" class="form-control">
											</div>
											<div class="form-group">
												<label for="address">Address</label>
												<input type="address" name="address" class="form-control" id="address">
											</div>
											<div class="form-group">
												<label for="birth">Date of Birth</label>
												<input type="text" name="birth" autocomplete="off" class="form-control" id="datepicker">
											</div>
											<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
										</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>


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
		<script type="text/javascript">
			$(function(){
				$("#datepicker").datepicker({
					'format':'yyyy-mm-dd',
					'autoclose':true
				});
				var countryOptions;
				var cityOptions;
				$.getJSON("json/countries.json",function(data){
					$.each(data,function(index){
						countryOptions += "<option value=\""+index+"\">"+index+"</option>";
					});
					cityOptions = "";
					for(var i in data["Afghanistan"])
					{
						c = data["Afghanistan"][i];
						cityOptions += "<option value=\""+c+"\">"+c+"</option>";
					}
					$("#city").html(cityOptions);
					$("#country").html(countryOptions);
				});
				$("#country").change(function(){
					var selectedCountry = $(this).children("option:selected").val();
					$.getJSON("json/countries.json",function(data){
						cityOptions = "";
						for(var i in data[selectedCountry])
						{
							c = data[selectedCountry][i];
							cityOptions += "<option value=\""+c+"\">"+c+"</option>";
						}
						$("#city").html(cityOptions);
					});
				});
			});
		</script>

	</body>

</html>
