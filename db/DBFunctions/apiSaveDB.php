<?php
function apiSaveDB($asin, $title, $current_price, $description, $features, $images, $out_of_stock) {
	if ($out_of_stock == "true") {
		//1 means true, product is out of stock
		$out_of_stock = 1;
		$current_price = 0;
	} else {
		//0 means false, product is in stock
		$out_of_stock = 0;
	}

	$errorString = "Make sure this fits by entering your model number.";
	if(strpos($description, $errorString) !== false) {
		$description = substr($description, strlen($errorString) + 1);
	}

	$stmt = getDB()->prepare("SELECT out_of_stock FROM Products WHERE asin = :asin");
        $stmt->execute([":asin" => $asin]);
	$affected = $stmt->rowCount();
	$oldProd = 0;
	if($affected == 1) {
		$oldStock = ($stmt->fetch(PDO::FETCH_ASSOC))["out_of_stock"];
		$oldProd = 1;
	}

	$stmt = getDB()->prepare("INSERT INTO Products (asin, title, current_price, description, features, images, out_of_stock) VALUES(:asin, :title, :current_price, :description, :features, :images, :out_of_stock) ON DUPLICATE KEY UPDATE title=:title, current_price=:current_price, description=:description, features=:features, images=:images, out_of_stock=:out_of_stock");
	$stmt->execute([":asin"=>$asin, ":title"=>$title, ":current_price"=>$current_price, ":description"=>$description, ":features"=>$features, ":images"=>$images, ":out_of_stock"=>$out_of_stock]);
	$affected = $stmt->rowCount();
	$stmt = getDB()->prepare("SELECT out_of_stock, product_family_name FROM Products WHERE asin = :asin");
	$stmt->execute([":asin" => $asin]);
	$prodData = $stmt->fetch(PDO::FETCH_ASSOC);
	$newStock = $prodData["out_of_stock"];
	$family = $prodData["product_family_name"];
	echo $family;
	$stockUpdated = 0;
	if($oldStock == 1 && $newStock == 0){
		$stmt = getDB()->prepare("UPDATE Products SET quantity = 5 WHERE asin = :asin");
 	   	$stmt->execute([":asin" => $asin]);
		$stockUpdated = 1;
	} elseif ($newStock == 1) {
		$stmt = getDB()->prepare("UPDATE Products SET quantity = 0 WHERE asin = :asin");
		$stmt->execute([":asin" => $asin]);
	}
	if($affected == 2){
		if($oldProd && $stockUpdated) {
			echo "Sending Mail";
			$stmt = getDB()->prepare("SELECT * FROM Tracking");
        		$stmt->execute();
        		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                		if(strpos($row["product_family_name"], $family) !== false) {
                        		$stmt2 = getDB()->prepare("SELECT email FROM Users WHERE user_name=:user");
                        		$stmt2->execute([":user"=>$row["user_name"]]);
                        		$email = $stmt2->fetch(PDO::FETCH_ASSOC)["email"];
                        		$mailList[$email] = $row["user_name"];
					}
			}
			if (!empty($mailList)) {
				mailClient($mailList, $asin, $title, $images);
			}		
		}
		return ["status"=>200, "message"=>"Product data found"];
	} else if ($affected == 2) {
		return ["status"=>200, "message"=>"Product data updated"];
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return ["status"=>400, "message"=>"Product not found"];
	}
}
