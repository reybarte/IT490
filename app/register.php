<?php
require(__DIR__."/MQPublish.inc.php");
session_start();
?>
<form method="POST">
<div class="container">
	<h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

	<label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
        <hr>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <button type="submit" class="registerbtn">Register</button>
</div>

<div class="container signin">
	<p>Already have an account? <a href="#">Sign in</a>.</p>
</div>
</form>

<form method="POST">
<input type="email" placeholder="email" name="email"/>
<input type="text" placeholder="username" name="username"/>
<input type="text" placeholder="first name" name="first name"/>
<input type="text" placeholder="last name" name="last name"/>
<input type="password" placeholder="password" name="password"/>
<input type="submit" name="submit" value="Register"/>
</form>


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
