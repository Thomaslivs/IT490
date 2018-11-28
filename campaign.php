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
<script type = "text/javascript">
function start_campaign(){
	//debugger;
	var xhr = new XMLHttpRequest();
	var url = "RMQCampaign.php";
	var subredditname = document.getElementById("subredditname").value;
	var title = document.getElementById("title").value;
	var post = document.getElementById("post").value;
	var delay = document.getElementById("delay").value;
	var data = "subredditname="+subredditname+"&title="+title+"&post="+post+"&delay="+delay;
	xhr.open("POST",url, true);
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
		if(this.readyState == 4 && this.status == 200){
			response = this.responseText;
			endresult = JSON.parse(response);
			document.getElementById("output").innerHTML = "Campaign started"+" on "+subredditname+ " called " + title +" with post " +post +".";
		}
};
	xhr.send(data);
	
}
</script>
<div class = "main">

</div>
<center>
<form>
<label for="subredditname" > Enter a Sub-Reddit Name</label><br>
<input id="subredditname" type="text" name="subredditname" autocomplete="off" placeholder = "Sub-Reddit Name" Required><br><br>
<label for="title" > Enter a Title</label><br>
<input id="title" type="text" name="title" autocomplete="off" placeholder = "Title" Required><br><br>
<label for="post" > Enter a Post</label><br>
<textarea id="post" type="text" name="post" autocomplete="off" placeholder = "Post" Required></textarea><br><br>
<label for="delay" > Enter how long to delay the Post by</label><br>
<input id="delay" type="number" name="delay" min = "0"max="9999" autocomplete="off" placeholder = "Enter delay(hour)" Required><br><br>
<button type = "button" onclick = 'start_campaign();'>Start Campaign</button>
</form>
<font size = "4">
<div style = "background-color: #FFFFFF">
<div id = "output">
</div>
</div>
</font>
</center>
</body>
