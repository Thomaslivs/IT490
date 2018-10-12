<!DOCTYPE html>
<html>
<head>
	<style>
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
		html {
			background-image: url("IT490_V4.png");
			background-repeat: no-repeat;
			background-color: yellow;
			}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}
.sticky + .content {
  padding-top: 60px;
}
li a:hover {
    background-color: yellow;
}
	</style>
</head>
<body>
<div id = "nav">
<ul>
  <li><a href="/homepage.php">Home</a></li>
  <li><a href="/Reddit_Interface.php">Reddit Interface</a></li>
  <li><a href="/setting.php">Setting</a></li>
  <li><a href="/logout.php">Log Out</a></li>
</ul>
</div>
<font size= "7" >WELCOME<br></font>
<div id = "Message">
<center><font size= "5"> This is the homepage for Null Breaker's Reddit Social Media Aggregator.</font></center>
</div>
<!--- Start of the JS to make navbar sticky --->
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("nav");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</div>
</html>
