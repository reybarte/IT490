<?php

require_once(__DIR__ . '/../lib/path.inc');
require_once(__DIR__ . '/../lib/get_host_info.inc');
require_once(__DIR__ . '/../lib/rabbitMQLib.inc');
require(__DIR__ . "/dbconnection.php");

//separate files for DB calls so it's easier to divide work
require(__DIR__ . "/DBFunctions/login.php");
require(__DIR__ . "/DBFunctions/register.php");
require(__DIR__ . "/DBFunctions/apiClient.php");
require(__DIR__ . "/DBFunctions/apiSaveDB.php");
require(__DIR__ . "/DBFunctions/getCache.php");
require(__DIR__ . "/DBFunctions/roleChange.php");
require(__DIR__ . "/DBFunctions/transaction.php");
require(__DIR__ . "/DBFunctions/remove.php");
require(__DIR__ . "/DBFunctions/tracking.php");
require(__DIR__ . "/DBFunctions/getTrackingInfo.php");
require(__DIR__ . "/DBFunctions/getTransactionHistory.php");
//TODO add more as they're developed

function request_processor($req)
{
	echo "Received Request" . PHP_EOL;
	echo "<pre>" . var_dump($req) . "</pre>";
	if (!isset($req['type'])) {
		return "Error: unsupported message type";
	}
	//Handle message type
	$type = $req['type'];
	switch ($type) {
		case "login":
			return login($req['username'], $req['password']);
		case "register":
			return register($req["email"], $req["username"], $req["fName"], $req["lName"], $req["password"]);
		case "validate_session":
			return validate($req['session_id']);
		case "apiCall":
			$arr = apiClient($req['asin']);
			return apiSaveDB($arr->asin, $arr->title, $arr->current_price, $arr->description, $arr->features, $arr->images, $arr->out_of_stock);
		case "getCache":
			return getCache();
		case "roleChange":
			return roleChange($req['email'], $req['role']);
		case "remove":
			return remove($req['asin']);
		case "transaction":
			return transaction($req["user"], $req["asin"], $req["product_name"]);
		case "tracking":
			return tracking($req["family"], $req["user"]);
		case "getTrackingInfo":
			return getTrackingInfo($req["user"]);
		case "getTransactionHistory":
			return getTransactionHistory($req["user"]);
		case "echo":
			return ["return_code" => '0', "message" => "Echo: " . $req["message"]];
	}
	return array(
		"return_code" => '0',
		"message" => "Server received request and processed it"
	);
}
$server = new rabbitMQServer("APPDBQ.ini", "dbServer");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
