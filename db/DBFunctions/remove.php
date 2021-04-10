<?php
function remove($asin){
	//from dbconnection.php
	$stmt = getDB()->prepare("DELETE FROM Products where asin = :asin");
	$stmt->execute([":asin"=>$asin]);
	$result = $stmt->rowCount();
	if($result){
		return array("status"=>200, "message"=>"Product Removed");
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status"=>400, "message"=>"Product not found");
	}
}
?>
