<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<?php /*
session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
*/?>
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
<center>
<font color="Black">
<font size = "5">
<p>This is the main page of the Reddit Interface</p>
</font>
<div id = "output" style="width:100%;height:61%;overflow:scroll;">
<p>To the left side of the page are tabs to redirect to other pages</p><br>
<p> <b>Start Campaign</b>: Starts a campaign(allowing for multiple topics at set intervals) or posts a topic to that Sub-Reddit
<center> Requires -> A subreddit name , a title, and post. <br>
	Optional -> Enter a delay ( Leaving it empty will result in an immediate post)<br>
	Returns -> Text syaing the campaign was started</center></p>
<p> <b> Comment</b>: Posts a comment to a specific topic.<br>
<center> Requires:<br>  Topic -> a topic <br> Comment -> Topic ID<br>
	Returns -> Text saying the comment was made</center></p>
<p><b>Key Threads</b>: Finds the top threads for the specified topic<br>
	<center>Requires -> a topic(keyword)<br> 
	Optional -> Limiter(Limit number of results)<br>
	Returns -> Key threads related to the topic provided</center><p>
<p><b>Key Players</b>: Finds the top players(redditors) for the specified topic<br>
	<center>Requires -> a topic(keyword)<br> 
	Optional -> Limiter(Limit number of results)<br>
	Returns -> Key Players associated to the topic provided</center><p>
<p><b>Find User</b>: Checks if the username exists<br>
	<center>Requires -> a username<br>
	Returns -> NULL if username does not exist or Infomation about the username if it exists</center><p>
</font>
</center>
</div>
</div>
</body>
