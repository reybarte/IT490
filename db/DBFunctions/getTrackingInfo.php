<?php
function getTrackingInfo($user){
	//from dbconnection.php
	$stmt = getDB()->prepare("SELECT * FROM ProductFamily");
	$stmt->execute();
	$countData = $stmt->fetchAll();

	$stmt = getDB()->prepare("SELECT product_family_name FROM Tracking WHERE user_name=:user");
	$stmt->execute([":user"=>$user]);
	$tracked = $stmt->fetch(PDO::FETCH_ASSOC)["product_family_name"];	
	if($tracked == "" || $tracked == NULL) {
		$userPref[] = "";
        }
        else if (($tracked = explode("|", $tracked)) != false) {
                foreach ($tracked as $value) {
                        $userPref[$value] = 1;
                }
        } else {
                $userPref[$tracked] = 1;
        }

	
	if($countData && $userPref){
			return ["status"=>200, "userPref"=>$userPref, "countData"=>$countData];//send user data back so app can use it
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return ["status"=>400, "message"=>"Error"];
	}
}


?>
