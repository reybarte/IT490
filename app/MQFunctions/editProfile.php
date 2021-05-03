<?php
function editProfile($oldUser, $newUser, $email, $fName, $lName){
	try{
		require_once(__DIR__.'/../../lib/path.inc');
		require_once(__DIR__.'/../../lib/get_host_info.inc');
		require_once(__DIR__.'/../../lib/rabbitMQLib.inc');

		$client = new RabbitMQClient('APPDBQ.ini', 'testServer');
		$msg = ["oldUser"=>$oldUser, "newUser"=>$newUser, "email"=>$email, "fName"=>$fName, "lName"=>$lName, "type"=>"editProfile");
		$response = $client->send_request($msg);
		return $response;
	}
	catch(Exception $e){
		return $e->getMessage();
	}
}
?>
