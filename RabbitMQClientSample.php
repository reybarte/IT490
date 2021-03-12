<?php
require_once('lib/path.inc');
require_once('lib/get_host_info.inc');
require_once('lib/rabbitMQLib.inc');

$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
if(isset($argv[1])){
	$type = (string)$argv[1];
	if($type == "login"){
	    $msg = array("type"=>$argv[1], "username"=>$argv[2], "password"=>$argv[3]);
	}
	else{
	    $msg = array("type"=>(string)$argv[1],"message"=>(string)$argv[2]);
	}
}
else{
	$msg = array("message"=>"test message", "type"=>"echo");
}

$response = $client->send_request($msg);

echo "client received response: " . PHP_EOL;
print_r($response);
echo "\n\n";

if(isset($argv[0]))
echo $argv[0] . " END".PHP_EOL;
