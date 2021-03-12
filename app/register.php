<?php
require(__DIR__."/MQPublish.inc.php");
require(__DIR__."/header.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Register</title>
</head>

<body>
<form method="POST">
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
                            <input type="text" class="form-control" placeholder="Enter Username" name="username"
                                id="usr" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                id="psw" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter First Name" name="firstName"
                                id="firstName" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName"
                                id="lastName" required>
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

<?php
if(isset($_POST["submit"])){
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	//TODO validate

	//calls function from MQPublish.inc.php to communicate with MQ
	$response = register($email, $username, $firstName, $lastName, $password);
	if($response["status"] == 200){
		$_SESSION["user"] = $response["data"];
	}
	else{
		var_export($response);
	}

}
?>
