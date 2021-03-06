<?php
function login($username, $password){
	//from dbconnection.php
	$stmt = getDB()->prepare("SELECT * FROM Users where user_name = :username LIMIT 1");
	$stmt->execute([":username"=>$username]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$password = hash('sha512', $password, false);
	//TODO do proper checking, maybe user doesn't exist
	if($result){
		if($password == $result["password"]){
			unset($result["password"]);//never return password, there's no need to
			return array("status"=>200, "data"=>$result);//send user data back so app can use it
		}
		else{
			//must return proepr message blah blah blah see below
			return array("status"=>403, "message"=>"Unverified");
		}
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status"=>400, "message"=>"Nonexistent");
	}
}
?>
