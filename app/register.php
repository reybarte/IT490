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
	<h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

		<label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="usr"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="usr" id="usr" required>

		<label for="firstName"><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="firstName" id="firstName" required>

		<label for="lastName"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lastName" id="lastName" required>
		
		<label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
        <hr>

        <button type="submit" class="registerbtn">Register</button>
</div>

<div class="container signin">
	<p>Already have an account? <a href="login.php">Sign in</a>.</p>
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
	$response = register($username, $password);
	if($response["status"] == 200){
		$_SESSION["user"] = $response["data"];
	}
	else{
		var_export($response);
	}

}
?>
