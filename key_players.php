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
function hideplayers() {
    var x = document.getElementById("players");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function key_users(){
	//debugger;
	var xhr = new XMLHttpRequest();
	var url = "RMQKey_players.php";
	var keyword = document.getElementById("keyword").value;
	var limit = document.getElementById("limit").value;
	var data = "keyword="+keyword+"&limit="+limit;
	xhr.open("POST",url, true);
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
		if(this.readyState == 4 && this.status == 200){
			response = this.responseText;
			endresult = JSON.parse(response);
			if (document.getElementById("output").innerHTML == "Loading...."){
				document.getElementById("output").innerHTML = "";
			for (var i=0; i < endresult.length; i++)
			{
			var br = document.createElement('br');//create link
			document.getElementById("output").appendChild(br);
			document.getElementById("output").innerHTML += endresult[i];//add to body
			}
			}
			else{
				document.getElementById("output").innerHTML = "Loading....";
			}
		}
};
	document.getElementById("output").innerHTML = "Loading....";
	xhr.send(data);
	
}
</script>
<div class = "main">

</div>
<fieldset id="field"><legend align="left">Key Players</legend>
<center>
<form>
<label for="keyword" > Enter a Key Word</label><br>
<input id="keyword" type="text" name="keyword" autocomplete="off" placeholder = "keyword" Required><br><br>
<label for="limit"> Select a Number to limit the results:</label><br> 
 <select id = "limit">
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="20">20</option>
  <option value="25">25</option>
  <option value="30">30</option>
  <option value="35">35</option>
  <option value="40">40</option>
  <option value="45">45</option>
  <option value="50">50</option>
</select><br>
<button type = "button" onclick = 'key_users();'>Find Key Users</button>
<p> Warning this may take a while</p>
</form>
</fieldset>
<fieldset id="field"><legend align="left">Output</legend>
<button onclick="hideplayers()">Show Results</button>
<div id = "players" style = "display: none">
<div id = "output" style="width:70%;height:30%;line-height:1em;overflow:scroll;background-color: #FFFFFF;">
</div>
</div>
</center>
</fieldset>
</body>
