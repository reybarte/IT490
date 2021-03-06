<?php
session_start();
require("MQPublish.inc.php");
require(__DIR__ . "/header.php");

if (isset($_SESSION["user"])) {
	if (isset($_POST["request"])) {
		if ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "product manager") {
			ob_start();
			$result = (array)apiCall($_POST["add"]);
			ob_end_clean();
			$prodFlag = true;
		} else {
			$prodFlag = false;
		}
		unset($_POST["request"]);
	} elseif (isset($_POST["remove"])) {
		if ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "product manager") {
			ob_start();
			$result = (array)remove($_POST["rem"]);
			ob_end_clean();
			$prodRemFlag = true;
		} else {
			$prodRemFlag = false;
		}
		unset($_POST["remove"]);
	} elseif (isset($_POST["roleChange"])) {
		if ($_SESSION["user"]["role"] == "admin") {
			ob_start();
			$result = (array)roleChange($_POST["email"], $_POST["role"]);
			ob_end_clean();
			$roleFlag = true;
		} else {
			$roleFlag = false;
		}
		unset($_POST["roleChange"]);
	}
	elseif (isset($_POST["update"])) {
		if ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "product manager") {
			ob_start();
			$result = (array)updateStock();
			ob_end_clean();
			$updateFlag = true;
		} else {
			$updateFlag = false;
		}
			unset($_POST["update"]);
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
	<!-- Admin Form -->
	<form method="POST" action="admin.php">
		<div class="container d-flex justify-content-center register-form">
			<div class="form" style="width: 900px;">
				<div class=" note">
					<p><?php echo "Welcome " . $_SESSION["user"]["user_name"]; ?></p>
				</div>
				<div class="form-content">
					<div class="row">
						<div class="col-md-12">
							<!-- Add Product -->
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter ASIN Number to Add Product" name="add" id="asin">
							</div>
							<div class="theButton pt-3">
								<button type="submit" name="request" class="btnSubmit">Find Product</button>
							</div>
							<?php
							if (isset($prodFlag)) {
								if (!$prodFlag) {
									echo "You must have the proper priveleges";
								} else {
									echo $result["message"];
								}
							}
							?>

							<!-- Remove Product -->
							<div class="form-group pt-5">
								<input type="text" class="form-control" placeholder="Enter ASIN Number to Remove Product" name="rem" id="asin">
							</div>
							<div class="theButton pt-3">
								<button type="submit" name="remove" class="btnSubmit">Remove Product</button>
							</div>

							<?php
							if (isset($prodRemFlag)) {
								if (!$prodRemFlag) {
									echo "You must have the proper priveleges";
								} else {
									echo $result["message"];
								}
							}
							?>

							<!-- Role Change -->
							<div class="form-group pt-5">
								<input type="text" class="form-control" placeholder="Enter Email of User and Select Role Change" name="email" id="email">
								<label for="cl" class="pl-2 pr-1">Select Role Change:</label>
								<input type="radio" id="cl" name="role" value="client">
								<label for="cl">Client</label>
								<input type="radio" id="pm" name="role" value="product manager">
								<label for="pm">Product Manager</label>
								<input type="radio" id="ad" name="role" value="admin">
								<label for="ad">Admin</label>
							</div>
							<div class="theButton pt-2 pb-4">
								<button type="submit" name="roleChange" class="btnSubmit">Change Role</button>
							</div>
							<?php
							if (isset($roleFlag)) {
								if (!$roleFlag) {
									echo "You must have the proper priveleges";
								} else {
									echo $result["message"];
								}
							}
							?>

							<!-- Refresh Quantity -->
							<div class="form-group pt-5">
								<h5 class="text-center mb-0">Refresh Quantity for All Products</h5>
							</div>
							<div class="theButton pt-3">
								<button type="submit" name="update" class="btnSubmit">Refresh Quantity</button>
							</div>
							<?php
							if(isset($updateFlag)){
								if (!$updateFlag) {
									echo "You must have the proper priveleges";
								} else {
									echo $result["message"];
								}
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
