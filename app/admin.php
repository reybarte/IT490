<?php
require("MQPublish.inc.php");
session_start();

if (isset($_SESSION["user"])) {
	if (isset($_POST["request"])) {
		if ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "product manager") {
			apiCall($_POST["asin"]);
			$prodFlag = true;
		} else {
			$prodFlag = false;
		}
	} elseif (isset($_POST["roleChange"])) {
		if ($_SESSION["user"]["role"] == "admin") {
			roleChange($_POST["email"], $_POST["role"]);
			$roleFlag = true;
		} else {
			$roleFlag = false;
		}
	}
} else {
	echo "<script>alert('You must be logged in to access this page.')</script>";
	echo "<script>window.location = 'login.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="JS/navbar.js"></script>
	<title>Admin</title>
</head>

<body>
	<!-- Nav -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">GPU Guru</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav w-100">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="productlist.php">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Statistics</a>
					</li>
					<div class="nav-item dropdown ml-auto">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profile</a>
						<div class="dropdown-menu">
							<a href="#" class="dropdown-item">Profile</a>
							<a href="login.php" class="dropdown-item">Login</a>
							<a href="register.php" class="dropdown-item">Register</a>
							<a href="admin.php" class="dropdown-item active">Admin</a>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Admin Form -->
	<form method="POST" action="admin.php">
		<div class="container register-form">
			<div class="form">
				<div class="note">
					<p><?php echo "Welcome " . $_SESSION["user"]["user_name"]; ?></p>
				</div>
				<div class="form-content">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter ASIN Number" name="asin" id="asin">
							</div>
							<div class="theButton pt-3">
								<button type="submit" name="request" class="btnSubmit">Find Product</button>
							</div>
							<?php
							if (isset($prodFlag) && !$prodFlag) {
								echo "You must have the proper priveleges";
							}
							?>

							<div class="form-group pt-2">
								<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
								<label for="cl" class="pl-2 pr-1">Select Role Change:</label>
								<input type="radio" id="cl" name="role" value="client">
								<label for="cl">Client</label>
								<input type="radio" id="pm" name="role" value="product manager">
								<label for="pm">Product Manager</label>
								<input type="radio" id="ad" name="role" value="admin">
								<label for="ad">Admin</label>
							</div>
							<div class="theButton pt-2">
								<button type="submit" name="roleChange" class="btnSubmit">Change Role</button>
							</div>
							<?php
							if (isset($roleFlag) && !$roleFlag) {
								echo "You must have the proper priveleges";
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

</body>

</html>