<?php
function apiGetCache($asin){
	//from dbconnection.php
	$stmt = getDB()->prepare("SELECT * FROM Products");
	$stmt->execute([":asin"=>$asin]);
	$result = $stmt->fetchAll();
	if($result){
			return array("status"=>200, "data"=>$result);//send user data back so app can use it
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status"=>400, "message"=>"Product not found in DB");
	}
}


?>
