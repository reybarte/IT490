<?php
function register($username, $password){
	//from dbconnection.php
	$stmt = getDB()->prepare("INSERT INTO User VALUES (:email,:username,:fName,:lName,:password)");
	$password = hash('sha512', $password, false);
	$result = $stmt->execute([":email"=>$email,":username"=>username,":fName"=>$fName,":lName"=>$lName,":pass"=>$password]);;
	//TODO do proper checking, maybe user doesn't exist
	if($result){
		return array("status"=>200, "message"=>"Did we register successfully?");
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status"=>400, "message"=>"Error, please try again!");
	}
}
?>
