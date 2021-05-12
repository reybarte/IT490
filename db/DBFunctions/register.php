<?php
function register($email, $username, $fName, $lName, $password)
{
	//from dbconnection.php
	$stmt = getDB()->prepare("INSERT INTO Users (email, user_name, first_name, last_name, password) VALUES (:email,:username,:fName,:lName,:password)");
	$password = hash('sha512', $password, false);
	$result = $stmt->execute([":email" => $email, ":username" => $username, ":fName" => $fName, ":lName" => $lName, ":password" => $password]);
	//TODO do proper checking, maybe user doesn't exist
	if ($result) {
		$stmt = getDB()->prepare("CREATE TABLE T$username (asin VARCHAR(10) NOT NULL, product_name VARCHAR (200) NOT NULL, price DECIMAL (10, 2) NOT NULL, purchase_date DATETIME NOT NULL, conf_num INT NOT NULL)");
		$stmt->execute();
		$stmt = getDB()->prepare("SELECT SUM(count) as trackCount FROM ProductFamily");
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_ASSOC);
		$stmt = getDB()->prepare("INSERT INTO TrackStats (date, count) VALUES (CURRENT_TIMESTAMP, :count)");
		$stmt->execute([":count" => $count["trackCount"]]);
		return array("status" => 200, "message" => "Registered");
	} else {
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status" => 400, "message" => "Error");
	}
}
