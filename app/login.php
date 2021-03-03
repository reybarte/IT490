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
    <title>Login</title>
</head>

<body>
    <div class="container register-form">
        <div class="form">
            <div class="note">
                <p>Please fill in username and password to log in.</p>
            </div>

            <div class="form-content">
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Username" name="username" id="usr"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter Password" name="password"
                            id="psw" required>
                    </div>
                    <div class="theButton">
                        <button type="submit" name="submit" class="btnSubmit">Login</button>
                    </div>
                    <div class="nextPage">
                        <br>
                        <p>Don't have an account? <a href="register.php">Register</a>.</p>
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
	$response = login($username, $password);
	if($response["status"] == 200){
		$_SESSION["user"] = $response["data"];
	}
	else{
		var_export($response);
	}

}
?>
