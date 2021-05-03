<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");
if(isset($_POST["edit"])) {
	ob_start();
	$result = (array)editProfile($_SESSION["user"]["user_name"], $_POST["username"], $_POST["email"], $_POST["firstName"], $_POST["lastName"]);
	ob_end_clean();
	if($result["status"] == 200) {
		$_SESSION["user"]["email"] = $_POST["email"];
		$_SESSION["user"]["user_name"] = $_POST["username"];
		$_SESSION["user"]["first_name"] = $_POST["firstName"];
		$_SESSION["user"]["last_name"] = $_POST["lastName"];
		echo "<script>alert('Profile Updated');</script>";
                echo "<script>window.location = 'profile.php';</script>";	
	}
}


?>
<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="JS/desclimit.js"></script> <!-- Add 'limitdesc' as a class variable to limit characters -->
    <link rel="icon" href="IMG/490IconPic.png">
    <title>Profile</title>
</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
	<div class="card" style="width: 700px;">
	    <div class="card-body">
		<h5 class="card-title text-center mb-0">Edit Profile</h5>
	    </div>
		<form method="POST" action="editProfile.php">
			<li class="list-group-item"><strong>Email:</strong> <?php echo $_SESSION["user"]["email"] ?></li>
			<li class="list-group-item"><strong>Username:</strong> <?php echo $_SESSION["user"]["user_name"] ?></li>
			<li class="list-group-item"><strong>First Name:</strong> <?php echo $_SESSION["user"]["first_name"] ?></li>
			<li class="list-group-item"><strong>Last Name:</strong> <?php echo $_SESSION["user"]["last_name"] ?></li>
			</br>
			<p>Email: </p><input type="email" class="form-control" placeholder="<?php echo $_SESSION["user"]["email"] ?>" value="<?php echo $_SESSION["user"]["email"] ?>" name="email" id="email" required>
			<p>Username: </p><input type="text" class="form-control" placeholder="<?php echo $_SESSION["user"]["user_name"] ?>" value="<?php echo $_SESSION["user"]["user_name"] ?>" name="username" id="usr" required>
			<p>First Name: </p><input type="text" class="form-control" placeholder="<?php echo $_SESSION["user"]["first_name"] ?>" value="<?php echo $_SESSION["user"]["first_name"] ?>" name="firstName" id="firstName" required>
			<p>Last Name: </p><input type="text" class="form-control" placeholder="<?php echo $_SESSION["user"]["last_name"] ?>" value="<?php echo $_SESSION["user"]["last_name"] ?>" name="lastName" id="lastName" required>
			<div class="theButton text-center">
			</br>
				<button type="submit" name="edit" class="btnSubmit">Save Edits</button>
			</div>
		</form>


	</div>
    </div>
</body>

</html>
