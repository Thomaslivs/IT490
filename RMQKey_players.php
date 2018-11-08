<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$client = new rabbitMQClient("RMQKey_players.ini","testServer");
$msg = "test message";
$keyword = $_POST['keyword'];
$limit = $_POST['limit'];
$request = array();
$request['type'] = "key_players";
$request['keyword'] = $keyword;
$request['limit'] = $limit;
$request['message'] = $msg;
$response = $client->send_request($request);
echo $response;
?>
