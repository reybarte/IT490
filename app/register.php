<?php
require(__DIR__ . "/MQPublish.inc.php");
//require(__DIR__."/header.php");
session_start();

if (isset($_POST["submit"])) {

	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	//TODO validate	

	ob_start();
	//calls function from MQPublish.inc.php to communicate with MQ
	$response = (array)register($email, $username, $firstName, $lastName, $password);
	ob_end_clean();

	if ($response["status"] == 200) {
		$_SESSION["user"] = $response["data"];
		echo "<script>alert('Register Success');</script>";
		echo "<script>window.location = 'login.php'; </script>";
	} else if ($response["status"] == 400) {
		echo "<script>alert('Register Failed');</script>";
		echo "<script>window.location = 'register.php';</script>";
	} else {
		echo "something else";
		var_export($response);
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Register</title>
</head>

<body>
	<!-- Nav -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="index.php">GPU Guru</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
				<ul class="navbar-nav m-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="productlist.php">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Statistics</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="register.php">Register</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Settings</a>
					</li>
				</ul>

				<form class="form-inline my-2 my-lg-0">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
						<div class="input-group-append">
							<button type="button" class="btn btn-secondary btn-number">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</nav>
	<!-- Register Form -->
	<form method="POST" action="register.php">
		<div class="container register-form">
			<div class="form">
				<div class="note">
					<p>Please fill in this form to create an account.</p>
				</div>

				<div class="form-content">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter Username" name="username" id="usr" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>
							</div>
							<script src="JS/myscripts.js"></script>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter First Name" name="firstName" id="firstName" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter Last Name" name="lastName" id="lastName" required>
							</div>
							<div class="theButton">
								<button type="submit" name="submit" class="btnSubmit">Register</button>
							</div>
							<div class="nextPage">
								<br>
								<p>Already have an account? <a href="login.php">Sign in</a>.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>

</html>