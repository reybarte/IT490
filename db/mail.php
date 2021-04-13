<?php
require(__DIR__."/dbconnection.php");
function mailList($asin, $family) {
	/*
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

	 */
	
        $subject = "Tracked Item Back in Stock";
        $message = "Item ASIN #" . $asin . "is NOW IN STOCK." . "\r\n" .
                   "Visit us at 18.216.101.142/repo/app to purchase now!";
	$value = "test-jkfne0zje@srv1.mail-tester.com";
	echo "send to: " . $value . "\n";
		$to = $value;

                mail($to, $subject, $message);
		echo "mailed" . "\n";

}
mailList("B08J5F3G18", "3090");
?>
