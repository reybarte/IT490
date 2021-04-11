<?php
function getTrackersCount(){
	//from dbconnection.php
	$stmt = getDB()->prepare("SELECT * FROM ProductFamily");
	$stmt->execute();
	$result = $stmt->fetchAll();
	if($result){
			return ["status"=>200, "countData"=>$result];//send user data back so app can use it
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return ["status"=>400, "message"=>"Product not found in DB"];
	}
}


?>
