<?php
function apiClient($asin){
        try{
                require_once(__DIR__.'/../../lib/path.inc');
                require_once(__DIR__.'/../../lib/get_host_info.inc');
                require_once(__DIR__.'/../../lib/rabbitMQLib.inc');

                $client = new RabbitMQClient('APIDBQ.ini', 'dbServer');
                $msg = ["asin"=>$asin, "type"=>"apiRequest"];
                $response = $client->send_request($msg);
                return $response;
        }
        catch(Exception $e){
                return $e->getMessage();
        }
}
?>
