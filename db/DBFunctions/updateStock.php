<?php
function updateStock() {
	$stmt = getDB()-> prepare("SELECT * FROM Products WHERE out_of_stock = 1");
	$stmt->execute();
	$result = $stmt->rowCount();
	if ($result > 0) {
		while($OOSproducts = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$asin = $OOSproducts["asin"];
			$title = $OOSproducts["title"];
			$images = $OOSproducts["images"];
			$family = $OOSproducts["product_family_name"];
			$stmt2 = getDB()->prepare("SELECT * FROM Tracking");
			$stmt2->execute();
			while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

				if(strpos($row["product_family_name"], $family) !== false) {
					$stmt3 = getDB()->prepare("SELECT email FROM Users WHERE user_name=:user");
					$stmt3->execute([":user"=>$row["user_name"]]);
					$email = $stmt3->fetch(PDO::FETCH_ASSOC)["email"];
					$mailList[$email] = $row["user_name"];
				}
			}
			if (!empty($mailList)) {
				mailClient($mailList, $asin, $title, $images);
			}
		}
		$stmt = getDB()->prepare("UPDATE Products SET quantity = 5, current_price = 2000, out_of_stock = 0 WHERE out_of_stock = 1");
		$stmt->execute();
		return array("status" => 200, "message" => "Products updated");
	} else if ($result == 0) {
		return array("status" => 201, "message" => "All Products In Stock");
	} else {	
		return array("status" => 400, "message" => "Error");
	}
}
