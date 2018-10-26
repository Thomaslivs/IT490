#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
function redirect ($message, $targetfile, $delay){ 
echo "<br>$message<br>"; 
header( "refresh:$delay; url=".$targetfile ); 
exit(); } 
function gatekeeper(){ 
if ( !(isset($_SESSION["username"])) ) 
{ 
redirect ("Access denied, redirecting ...", "login.html", "5"); 
} 
}
$client = new rabbitMQClient("RabbitMQ.ini","testServer");
session_start();
$_SESSION['username'] = $_POST['user'];
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}
//if (isset($_POST['LoginSubmit'])){

$request = array();
$request['type'] = "login";
$request['username'] = $_POST['user'];
$request['password'] = $_POST['pass'];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";
$file = fopen("log.txt","a");
$ip=$_SERVER['REMOTE_ADDR'];
$space = ' ';
$type = 'Login';
$data = $ip .$space. $_POST['user'] .$space. date('Y-m-d H:i:s'). $space. $type. PHP_EOL;
echo fwrite($file,$data);
fclose($file);
echo $argv[0]." END".PHP_EOL;
if ($response == $_POST['user'])
{
	if ( !(isset($_SESSION["username"])) ) {

	gatekeeper();
}
else{
	redirect("hello","/homepage.php","0") ;
}
}
else
{
	redirect("Bye","/failed.php","0");
}
?>
