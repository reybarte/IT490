<?php
function roleChange($email, $role){
	//from dbconnection.php
	$stmt = getDB()->prepare("SELECT * from Users where email=:email");
	$stmt->execute(["email"=>$email]);
	//check if user not found
	if (!$stmt->rowCount()) {
		return ["status"=>400, "message"=>"User Not Found"];
	}
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	//check if user already has same role
	if ($result["role"] == $role) {
		return ["status"=>200, "message"=>"Already Role"];
	}
	//otherwise update role of user
	$stmt = getDB()->prepare("UPDATE Users SET role=:role WHERE email=:email");
	$result = $stmt->execute([":email"=>$email,":role"=>$role]);

	if($result){
		return ["status"=>200, "message"=>"Role Changed"];
	} else {
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status"=>400, "message"=>"Role Change Unsuccessful");
	}
}
?>
