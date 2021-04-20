<?php
function mailClient($mailList, $asin, $title, $images){
        try{
                require_once(__DIR__.'/../../lib/path.inc');
                require_once(__DIR__.'/../../lib/get_host_info.inc');
                require_once(__DIR__.'/../../lib/rabbitMQLib.inc');

                $client = new RabbitMQClient('APIDBQ.ini', 'testServer');
                $msg = ["mailList"=>$mailList, "asin"=>$asin, "title"=>$title, "images"=>$images, "type"=>"mailList"];
                $response = $client->send_request($msg);
                return $response;
        }
        catch(Exception $e){
                return $e->getMessage();
        }
}
?>
