#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$client = new rabbitMQClient("RabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = "login";
$request['username'] = $_GET['user'];
$request['password'] = $_GET['pass'];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
if ($response == $_GET['user'])
{
	header( 'Location: homepage.html' ) ;
}
else
{
	echo 'incorrect username/ password please try again.' ;
	sleep(1);
	header('Location: login.html');
	
}
?>

