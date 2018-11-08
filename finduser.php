<style>
	html {
		
		background-image: url("IT490_V4.png");
		background-position: 50%0%;
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
			top: 100%;
			width:100%;
			left: 0;
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
 /* The sidebar menu */
.sidenav {
    width: 160px; /* Set the width of the sidebar */
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    z-index: 50; /* Stay on top */
    top: 150; /* Stay at the top */
    left: 0;
    background-color: #959595; /* Black */
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
    color: #f1f1f1;
}

/* Style page content */
.main {
    margin-left: 160px; /* Same as the width of the sidebar */
    padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
} 
</style>
<?php 
session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
?>
<body>
<div id = "nav">
<ul>
  <li><a href="/homepage.php">Home</a></li>
  <li><a href="/Reddit_Interface.php">Reddit Interface</a></li>
  <li><a href="/user.php">User</a></li>
  <li><a href="/setting.php">Setting</a></li>
  <li><a href="/logout.php">Log Out</a></li>
</ul>
</div>
<div class="sidenav">
	<a href="campaign.php"> Start Campaign</a>
	<a href="post.php"> Comment</a>
	<a href="key_threads.php"> Key Threads</a>
	<a href="key_players.php"> Key Players</a>
	<a href="finduser.php">Find User</a>
</div>

<div class = "main">

</div>
<script type = "text/javascript">
function send_info(){
	//debugger;
	var xhr = new XMLHttpRequest();
	var url = "RMQUserInfoClient.php";
	var user = document.getElementById("username").value;
	var data = "user="+user;
	var response;
	var endresult;
	var txt = "";
	//alert(data);
	xhr.datatype = "json";
	xhr.open("POST",url, true);
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xhr.onreadystatechange = function () {
		if(this.readyState == 4 && this.status == 200){
			response = this.responseText;
			endresult = JSON.parse(response);
			//alert(Array.isArray(endresult));
			//alert(endresult.length);
			document.getElementById("output1").innerHTML = "UserName: "+ endresult[0];
			document.getElementById("output2").innerHTML = "User ID: "+ endresult[1];
			document.getElementById("output3").innerHTML = "Reddit creation date: "+ endresult[2];
			document.getElementById("output4").innerHTML = "Verify Email: "+ endresult[3];
		}
	};
	xhr.send(data);
	xhr.timeout= 20000;
	document.getElementById("output").innerHTML = "processing.....";
}
</script>
<center>
<div>
</div>
<form >
<label for="username" > Enter a Username to find if the user exists</label><br>
<input id="username" type="text" name="username" autocomplete="off" placeholder = "Username" Required><br><br>
<button type = "button" onclick = 'send_info();'>Send Username</button>
<p>If NULL, user does not exists</p>
</form>

<font size = "7">
<div style = "background-color: #FFFFFF">
<div id = "output1"></div>
<div id = "output2"></div>
<div id = "output3"></div>
<div id = "output4"></div>
</div>
</font>

</center>
</body>
