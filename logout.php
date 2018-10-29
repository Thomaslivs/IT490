<html>
<style>
	html {
		background-image: url("IT490_V4.png");
		background-repeat: no-repeat;
		background-color: yellow;
		}
ul {
    			list-style-type: none;
   			margin: 0px;
    			padding: 0;
    			overflow: hidden;
    			background-color: #959595;
    			position: -webkit-sticky;
			position: sticky;
			top: 0;
			width:100%;
		}

		li {
    			float: left;

		}

		li a {
    			display: block;
    			color: black;
    			text-align: center;
    			padding: 14px 16px;
    			text-decoration: none;
			}
		.nav {
   			list-style: none;
    			font-weight: bold;
    			margin-bottom: 10px;
    			width: 100%;
    			text-align: center;
    			background-color: #959595;
    			height:38px;
			}
</style>
</html>
<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION["username"] = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
header('Refresh:5;url = login.html');
?>
<!--- Start of the HTML and JS counter --->
<!--- Change the counter var and number in count to change the length of the count --->
<p> Session is being destroyed</p>
<p>You will be redirected in <span id="count">5</span> seconds....</p>
<p> Click <a href="login.html">here</a> if you are not redirected....</p>

<script type="text/javascript">
window.onload = function(){
(function(){
  var counter = 5;
  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count"); // to disply the element
      span.innerHTML = counter;
    }
    if (counter === 0) { // at 0 counter is cleared
        clearInterval(counter);
    }
  }, 1000); // counting in seconds
})();
}
</script>
