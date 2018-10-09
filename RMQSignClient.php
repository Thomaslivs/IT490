<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
session_start();
/*if (isset($_POST){
	$_SESSION['username'] = $_POST['signuser'];
	$_SESSION['password'] = $_POST['signpass'];
	$_SESSION['reddituser'] = $_POST['reddituser'];
	$_SESSION['redditpass'] = $_POST['redditpass'];
}*/

$client = new rabbitMQClient("RabbitMQsignup.ini","testServer");
$request2 = array();
$request2['type'] = "register";
$request2['username'] = $_POST['signuser'];
$request2['password'] = $_POST['signpass'];
$request2['reddituser'] = $_POST['reddituser'];
$request2['redditpass'] = $_POST['redditpass'];
$request2['message'] = $msg;
$response2 = $client->send_request($request2);
//$response = $client->publish($request);
echo "client received response: ".PHP_EOL;
print_r($response2);
echo "\n\n";
$file = fopen("log.txt","a");
$ip=$_SERVER['REMOTE_ADDR'];
$space = ' ';
$type = 'Sign Up';
$data = $ip .$space. $_POST['signuser'] .$space. date('Y-m-d H:i:s').$space.$type. PHP_EOL;
echo fwrite($file,$data);
fclose($file);
if ($response2 == "register")
{
	header('Location: login.html');
}
else
{
	header('Location: failed.php');
}
?>
