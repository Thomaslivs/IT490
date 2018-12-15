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
</head>
<?php 
session_start();
/*
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
*/
$user = $_SESSION["username"];
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
<font size= "7" ><p><?php echo "Settings for: ". $user; ?></p></font>
<!--<fieldset id="field"><legend align="left">Change Password</legend>
	<form action="RMQClient.php" method="post">
		<p>Old Password</p><input id="ppassword" type="password" name="ppassword" autocomplete="off" placeholder = "Past Password" Required><br><br>
		<p>New Password</p><input id="npassword" type="password" name="npassword" autocomplete="off" placeholder = "New Password" Required><br><br>		
		<div class="wrapper">
			<input type="submit" name="Submit" id = "SettingSubmit" value = "submit">
		</div>
		<br>
	</form>
</fieldset>--->
<script>
function send_email(){
	//debugger;
	var xhr = new XMLHttpRequest();
	var url = "RMQEmailNotif.php";
	var email = document.getElementById("email").value;
	var yn = document.getElementById("yn").value;
	var user = "<?php echo $user; ?>";
	var data = "user="+user+"&email="+email+"&yn="+yn;
	//document.getElementById("output3").innerHTML = "Email added: " + email + " to " + user + " as " + yn;
	xhr.open("POST",url, true);
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
		if(this.readyState == 4 && this.status == 200){
			response = this.responseText;
			endresult = JSON.parse(response);
			document.getElementById("output3").innerHTML = "Email added: " + email + " to " + user + " as " + yn;
		}
};
	xhr.send(data);
	
}
</script>
<fieldset id="field"><legend align="left">Receive Email Notifications</legend>
<form>
<form>
		<p>Email</p><input id="email" type="text" name="email" autocomplete="off" placeholder = "Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" Required><br><br>
		<select id = "yn">
			<option value = "Yes">Yes</option>
			<option value = "No"> No </option>
		</select>
			<button type = "button" onclick = 'send_email();'>Submit Email</button>
		</div>
		<br>
	</form>
</fieldset>
<div id = "output3" >
</div>

</body>
