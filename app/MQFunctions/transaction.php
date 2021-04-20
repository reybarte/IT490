<?php
function transaction($user, $asin, $product_name){
	try{
		require_once(__DIR__.'/../../lib/path.inc');
		require_once(__DIR__.'/../../lib/get_host_info.inc');
		require_once(__DIR__.'/../../lib/rabbitMQLib.inc');

		$client = new RabbitMQClient('APPDBQ.ini', 'testServer');
		$msg = ["user"=>$user, "asin"=>$asin, "product_name"=>$product_name, "type"=>"transaction"];
		$response = $client->send_request($msg);
		return $response;
	}
	catch(Exception $e){
		return $e->getMessage();
	}
}
