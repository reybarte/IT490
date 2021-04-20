<?php

require_once(__DIR__.'/../lib/path.inc');
require_once(__DIR__.'/../lib/get_host_info.inc');
require_once(__DIR__.'/../lib/rabbitMQLib.inc');
require(__DIR__."/api.php");
require(__DIR__."/mailList.php");

function request_processor($req){
	echo "Received Request".PHP_EOL;
	echo "<pre>" . var_dump($req) . "</pre>";
	if(!isset($req['type'])){
		return "Error: unsupported message type";
	}
	//Handle message type
	$type = $req['type'];
	switch($type){
		case "apiRequest":
			return apiCall($req["asin"]);
		case "mailList":
			return mailList($req["mailList"], $req["asin"], $req["title"], $req["images"]);
	}
	return array("return_code" => '0',
		"message" => "Server received request and processed it");
}
//will probably need to update the testRabbitMQ.ini path here
$server = new rabbitMQServer("APIDBQ.ini", "sampleServer");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>
