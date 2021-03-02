<?php
require(__DIR__."/MQPublish.inc.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>

<form method="POST">
<div class="container">
	<h1>Login</h1>
        <p>Please fill in username and password to log in.</p>
        <hr>

        <label for="usr"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="usr" id="usr" required>

		<label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
        <hr>

        <button type="submit" class="registerbtn">Register</button>
</div>

<div class="container signin">
	<p>Don't have an account? <a href="register.php">Register</a>.</p>
</div>
</form>
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
