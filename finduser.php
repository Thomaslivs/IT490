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
    height: 50%;
    width: 0%;
    position: fixed;
    z-index: 1;
    top: 55;
    left: 0;
    background-color: #959595;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
} 
</style>
<?php/* 
session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
*/?>
<body>
<script>
document.getElementById("main").addEventListener("click", toggleNav);

function toggleNav(){
    navSize = document.getElementById("sidenav").style.width;
    if (navSize == '20%') {
        return close();
    }
    return open();
}
function open() {
	document.getElementById("sidenav").style.width = "20%";
	document.getElementById("main").style.marginLeft= "20%";
	document.getElementById("sidenav").style.backgroundColor = "#959595";
}
function close()
{
    document.getElementById("sidenav").style.width = "0%";
    document.getElementById("main").style.marginLeft = "0%";
}
</script>
<div id = "nav">
<ul>
  <li><a href="/homepage.php">Home</a></li>
  <li><a href="/Reddit_Interface.php">Reddit Interface</a></li>
  <li><a href="/user.php">User</a></li>
  <li><a href="/setting.php">Setting</a></li>
  <li><a href="/logout.php">Log Out</a></li>
</ul>
</div>
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="toggleNav()">&#9776;</span>
</div>
<div id = "sidenav" class="sidenav" style = "black">
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
<div id = "result" style = "background-color: #FFFFFF">
<div id = "output1"></div>
<div id = "output2"></div>
<div id = "output3"></div>
<div id = "output4"></div>
</div>
</font>

</center>
</body>
