<?php
require(__DIR__."/../dbconnection.php");
function mailList($asin, $family) {
        $stmt = getDB()->prepare("SELECT * FROM Tracking");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		if(strpos($row["product_family_name"], "$family") !== false) {
			$stmt2 = getDB()->prepare("SELECT email FROM Users WHERE user_name=:user");
			$stmt2->execute([":user"=>$row["user_name"]]);
			$email = $stmt2->fetch(PDO::FETCH_ASSOC)["email"];
			$mailList[] = $email;
                }
        }


}
?>
