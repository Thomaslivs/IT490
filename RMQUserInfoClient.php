#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$client = new rabbitMQClient("RMQUserInfoClient.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}
$username = $_POST['username'];
$request = array();
$request['type'] = "user_info";
$request['username'] = $username;
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
//print_r($response);
$temp = "";
foreach ($response as $value){
	echo "<div class = 'outitem'>$value</div>";
	echo "<br>";
}
echo "\n\n";
echo $argv[0]." END".PHP_EOL;
?>
