
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc'); 
/*session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}*/
$client = new rabbitMQClient("RMQCampaign.ini","testServer");
$msg = "test message";
$name = $_POST['subredditname'];
$title = $_POST['title'];
$post = $_POST['post'];
$delay = $_POST['delay'];
$request = array();
$request['type'] = "campaign";
$request['name'] = $name;
$request['title'] = $title;
$request['post'] = $post;
$request['hour'] = $delay;
$request['message'] = $msg;
$response = $client->send_request($request);
echo $response;
?>
