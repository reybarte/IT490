<?php
function purchase($confnumber, $username)
{
    try {
        require_once(__DIR__ . '/../../lib/path.inc');
        require_once(__DIR__ . '/../../lib/get_host_info.inc');
        require_once(__DIR__ . '/../../lib/rabbitMQLib.inc');

        $client = new RabbitMQClient('APPDBQ.ini', 'testServer');
        $msg = array("confnumber" => $confnumber, "username" => $username, "type" => "purchase");
        $response = $client->send_request($msg);
        return $response;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
