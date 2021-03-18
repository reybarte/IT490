<?php
function apiDBRequest($asin, $title, $current_price, $description, $out_of_stock) {
	$description = $arr->description;
	if ($out_of_stock == "true") {
		//1 means true, product is out of stock
		$out_of_stock = 1;
	} else {
		//0 means false, product is in stock
		$out_of_stock = 0;
	}
	$stmt = getDB()->prepare("INSERT INTO Products VALUES(:asin, :title, :current_price, :description, :out_of_stock)");
	$stmt->execute([":asin"=>$asin, ":title"=>$title, ":current_price"=>$current_price, ":description"=>$description, ":out_of_stock"=>$out_of_stock]);
	if($result){
			return array("status"=>200, "message"=>"Product found");
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status"=>400, "message"=>"Product not found");
	}
}


}

?>
