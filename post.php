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
.selectboxit-container .selectboxit, .selectboxit-container .selectboxit-options {
  width: 600px; /* Width of the dropdown button */
  border-radius:0;
  max-height:240px;
}

.selectboxit-options .selectboxit-option .selectboxit-option-anchor {
    white-space: normal;
    min-height: 30px;
    height: auto;
} 
</style>
</head>
<script type = "text/javascript">
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

function hide() {
    var x = document.getElementById("comment");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function hidetopic() {
    var x = document.getElementById("topic");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function comment_topic(){
	//debugger;
	var xhr = new XMLHttpRequest();
	var url = "RMQComment1.php";
	var topic = document.getElementById("topic01").value;
	var data = "topic="+topic;
	xhr.open("POST",url, true);
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
		if(this.readyState == 4 && this.status == 200){
			response = this.responseText;
			endresult = JSON.parse(response);
			var selectoptions = "";
			for (var i=0; i < endresult.length; i++)
			{
			var br = document.createElement('br');//create link
			document.getElementById("output1").appendChild(br);
			document.getElementById("output1").innerHTML += endresult[i];//add to body
			postid = endresult[i].split(" ");
			selectoptions += "<option value = " + postid[2] +">"+postid.join(' ') + "</option>";
			}
			document.getElementById("listofids").innerHTML += selectoptions;
		}
};
	xhr.send(data);
	
}
function comment_post(){
	//debugger;
	var xhr = new XMLHttpRequest();
	var url = "RMQComment2.php";
	var ID = document.getElementById("ids").value;
	var comment = encodeURIComponent(document.getElementById("comment2").value);
	var data = "ID="+ID+"&comment="+comment;
	xhr.open("POST",url, true);
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
		if(this.readyState == 4 && this.status == 200){
			response = this.responseText;
			endresult = JSON.parse(response);
			document.getElementById("output2").innerHTML = "Comment Made: " + decodeURIComponent(comment) + data;
		}
};
	xhr.send(data);
	
}
</script>
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
<center>
<a href = "findid.php"><p>How to find a topic ID yourself!</p><a>
<fieldset id="field"><legend align="left">Topic ID</legend>
<button onclick="hidetopic()">Find Topic ID</button>
<div id = "topic" style = "display: none">
<form>
<label for="topic01" > Enter a Topic</label><br>
<input id="topic01" type="text" name="topic" autocomplete="off" placeholder = "topic"><br><br>
<button type = "button" onclick = 'comment_topic();'>Find Topic Id</button>
</form>
<fieldset id="field"><legend align="left">Results</legend>
<div id = "output1" style="width:800px;height:150px;line-height:1em;overflow:scroll;padding:5px;background-color: #FFFFFF;">
</div>
</div>
</fieldset>
</fieldset>
<fieldset id="field"><legend align="left">Make Comment</legend>
<button onclick="hide()">Make Comment</button>
<div id = "comment" style = "display: none">
<form>
<label for="ids" > Enter a ID</label><br>
<input id = "ids" list="listofids" style="width: 50%; overflow:wrap;">
<datalist id ="listofids">
</datalist>
<div id = "fulltext">
<div>
<label for="comment2" > Enter a Comment</label><br>
<textarea id="comment2" rows="10" cols="114" type="text" name="comment" autocomplete="off" placeholder = "comment" ></textarea><br><br>
<button type = "button" onclick = 'comment_post();'>Comment</button>
</form>
</fieldset>
<fieldset id="field"><legend align="left">Output</legend>
<div id = "output2">
</div>
</div>
</center>
</fieldset>
</body>
</html>
