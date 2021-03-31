<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");


if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	//TODO validate

	ob_start();
	//calls function from MQPublish.inc.php to communicate with MQ
	$response = (array)login($username, $password);
	ob_end_clean();

	if ($response["status"] == 200) {
		$_SESSION["user"] = (array)$response["data"];
		echo "<script>alert('Login Success')</script>";
		echo "<script>window.location = 'index.php'; </script>";
	} else if ($response["status"] == 400) {
		echo "<script>alert('Login Failed')</script>";
		echo "<script>window.location = 'login.php';</script>";
	} else if ($response["status"] == 403) {
		echo "<script>alert('Login Failed')</script>";
		echo "<script>window.location = 'login.php';</script>";
	} else {
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
	<title>Login</title>
</head>

<body>
	<!-- Login Form -->
	<form method="POST" action="login.php">
		<div class="container register-form">
			<div class="form">
				<div class="note">
					<p>Please fill in username and password to log in.</p>
				</div>

				<div class="form-content">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter Username" name="username" id="usr" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Enter Password" name="password" id="psw" required>
							</div>
							<div class="theButton">
								<button type="submit" name="submit" class="btnSubmit">Login</button>
							</div>

							<div class="nextPage">
								<br>
								<p>Do not have an account? <a href="register.php">Register</a>.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>

</html>
