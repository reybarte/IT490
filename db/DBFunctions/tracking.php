<?php
function tracking($family, $user) {
	$stmt = getDB()->prepare("SELECT product_family_name FROM ProductFamily");
	$stmt->execute();
	$families = $stmt->fetchAll();
	foreach ($families as $keys=>$values) {
		$familyCount[$values[0]] = 0;
	}	

	//$finalFamily stores new tracking preferences
	$finalFamily ="";
	if ($family == NULL) {
	} else {
		$finalFamily = $family[0];
		$familyCount[$family[0]] += 1;
		for ($x = 1;  $x < count($family); $x++) {
			$familyCount[$family[$x]] += 1;
			$finalFamily = $finalFamily . "|" . $family[$x];
		}
	}
	
	$stmt = getDB()->prepare("SELECT product_family_name FROM Tracking WHERE user_name=:user");
	$stmt->execute([":user"=>$user]);
	$tracked = $stmt->fetch(PDO::FETCH_ASSOC)["product_family_name"];
	if($tracked == $finalFamily) {
		return ["status"=>200, "data"=>$tracked, "message"=>"Tracking Preferences Unchanged"];
	}
	//$tracked is whats currently in the database
	if ($tracked == ""){
	}
	else if (($tracked = explode("|", $tracked)) != false) {
		foreach ($tracked as $value) {
			$familyCount[$value] -= 1;
		}
	} else {
		$familyCount[$tracked] -= 1;
	}
	

	$stmt = getDB()->prepare("INSERT INTO Tracking (user_name, product_family_name) VALUES (:user, :family) ON DUPLICATE KEY UPDATE product_family_name=:family");
	$stmt->execute([":user" => $user, "family" => $finalFamily]);
	$affected = $stmt->rowCount();
	if($affected){
		$stmt = getDB()->prepare("UPDATE ProductFamily SET count = count + :c WHERE product_family_name = :family");
		foreach ($families as $value) {
			$stmt->execute([":c"=>$familyCount[$value[0]], ":family"=>$value[0]]);
		}
		return ["status"=>200, "data"=>$tracked, "message"=>"Tracking Preferences Updated"];
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return ["status"=>400, "message"=>"Tracking Update Error"];
	}
}
?>
