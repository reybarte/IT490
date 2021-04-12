<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
if (isset($_SESSION["user"])) {
	$user = $_SESSION["user"]["user_name"];
	if (isset($_POST["submit"])) {
		ob_start();
		$preference = ((array)tracking($_POST["family"], $user))["message"];
		ob_end_clean();
	}
	ob_start();
	$info = (array)getTrackingInfo($user);
	ob_end_clean();
} else {
	echo "<script>alert('You must be logged in to access this page.')</script>";
	echo "<script>window.location = 'login.php'; </script>";
}
require(__DIR__ . "/header.php");


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="CSS/tracking.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Tracking</title>
</head>

<body>
	<div class="container d-flex justify-content-center mt-50">
		<div class="card pt-2 pb-0" style="width: 500px;">
			<div class="card-body pb-2 pr-0 pl-0 pt-0">
				<h4 class="card-title text-center mb-0">Tracking Preferences</h4>
			</div>
			<div class="borderRow pb-0"></div>

			<div class='text-center'>
				<form method=POST action="tracking.php">
					<?php
					ob_start();
					$familyGroups = $info["countData"];
					$userPreference = $info["userPref"];
					ob_end_clean();
					ksort($familyGroups);
					foreach ($familyGroups as $key => $value) {
						$prodName = ((array)$value)["product_family_name"];
						$userPref = isset(((array)$userPreference)[$prodName]) ? "checked" : "";
						echo "<div class=''><label>" . $prodName . "&nbsp<input type='checkbox' id='1' name='family[]' value='" . $prodName . "'" . $userPref . " > " . "</label></div>";
					}
					?>
			</div>
			<div class="text-center pb-2 pt-0">
				<button type="submit" name="submit" class="btn btn-primary">Track/Untrack</button>
			</div>
			</form>
			<div class='text-center pb-2 font-weight-bold'><?php echo $preference; ?></div>
		</div>
	</div>




	<div class="container d-flex justify-content-center mt-3">
		<div class="card pt-2 pb-2" style="width: 500px;">
			<div class="card-body pb-2 pr-0 pl-0 pt-0">
				<h4 class="card-title text-center mb-0">Total Trackers</h4>
			</div>
			<div class="borderRow pb-0"></div>
			<div class='text-center'>
				<?php
				ob_start();
				$countData = $info["countData"];
				ob_end_clean();
				ksort($countData);
				foreach ($countData as $key => $value) {
					//product family : count of trackers
					echo ((array)$value)["product_family_name"] . ": " . ((array)$value)["count"] . "<br>";
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>