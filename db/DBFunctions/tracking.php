<?php
function tracking($family, $user) {
	$finalFamily ="";
	if ($family == NULL) {
	} else if (count($family) == 1) {
		$finalFamily = $family[0];
	} else {
		$finalFamily = $family[0];
		for ($x = 1;  $x < count($family); $x++) {
			$finalFamily = $finalFamily . "|" . $family[$x];
		}
	}
	$stmt = getDb()->prepare("SELECT product_family_name FROM Tracking WHERE user_name=:user");
	$stmt->execute([":user"=>$user]);
	$tracked = $stmt->fetch(PDO::FETCH_ASSOC);
	if($tracked["product_family_name"] == $finalFamily) {
		return ["status"=>200, "message"=>"Tracking Preferences Unchanged"];
	}

	$stmt = getDB()->prepare("INSERT INTO Tracking (user_name, product_family_name) VALUES (:user, :family) ON DUPLICATE KEY UPDATE product_family_name=:family");
	$stmt->execute([":user" => $user, "family" => $family]);
	$affected = $stmt->rowCount();
	if($affected){
		return ["status"=>200, "message"=>"Tracking Preferences Updated"];
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return ["status"=>400, "message"=>"Tracking Update Error"];
	}
}
?>
