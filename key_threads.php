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
</head>
<?php /*
session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
*/?>
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
<script type = "text/javascript">
function key_threads(){
	//debugger;
	var xhr = new XMLHttpRequest();
	var url = "RMQKey_threads.php";
	var keyword = document.getElementById("keyword").value;
	var limit = document.getElementById("limit").value;
	var data = "keyword="+keyword+"&limit="+limit;
	xhr.open("POST",url, true);
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
		if(this.readyState == 4 && this.status == 200){
			response = this.responseText;
			endresult = JSON.parse(response);
			var bmlink = '<a href= "';
			var emlink = '">';
			var a = document.createElement('a');
			for (var i=0; i < endresult.length; i++)
			{
			var link = document.createElement('a');//create link
			var br = document.createElement('br');//create link
			link.setAttribute('href', endresult[i]);//set href
			link.innerHTML = 'Link#'+(i+1);//set text to be seen
			document.getElementById("output").appendChild(br);
			document.getElementById("output").appendChild(link);//add to body
			}
		}
};
	xhr.send(data);
	
}
</script>
<div class = "main">

</div>
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
</select> <br>
<button type = "button" onclick = 'key_threads();'>Find Key Threads</button>
</form>
<div id = "output" style="width:800px;height:150px;line-height:3em;overflow:scroll;padding:5px;background-color: #FFFFFF;">
</div>
</center>
</body>
