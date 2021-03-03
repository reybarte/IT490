<?php
require(__DIR__."/MQPublish.inc.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>

<body>
    <div class="container register-form">
        <div class="form">
            <div class="note">
                <p>Please fill in this form to create an account.</p>
            </div>

            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email"
                                required>
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
</body>

</html>

<?php
if(isset($_POST["submit"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	//TODO validate
	

	//calls function from MQPublish.inc.php to communicate with MQ
	$response = register($username, $password);
	if($response["status"] == 200){
		$_SESSION["user"] = $response["data"];
	}
	else{
		var_export($response);
	}

}
?>
