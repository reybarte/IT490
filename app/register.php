<?php
require(__DIR__."/MQPublish.inc.php");
session_start();
?>
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
