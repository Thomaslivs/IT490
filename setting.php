<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>
<?php 
session_start();

if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
$user = $_SESSION["username"];
?>

<body>
	<script type="text/javascript" src="sidenav.js"></script>
	<script type="text/javascript" src="fns.js"></script>
	<div id="nav">
		<ul>
			<li><a href="/homepage.php">Home</a></li>
			<li><a href="/Reddit_Interface.php">Reddit Interface</a></li>
			<li><a href="/user.php">User</a></li>
			<li><a href="/setting.php">Setting</a></li>
			<li><a href="/logout.php">Log Out</a></li>
		</ul>
	</div>
	<div class="header" style="margin-bottom: 1em;">
		<h3>
			<?php echo "Settings for: ". $user; ?>
		</h3>

	</div>
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
	<div class="content-wrapper">
		<div class="content-wrapper--inner">
	<fieldset id="field">
		<legend align="center">Receive Email Notifications</legend>
		<form>
			<form>
				<p>Email</p><input id="email" type="text" name="email" autocomplete="off" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
				 Required><br><br>
				<select id="yn">
					<option value="Yes">Yes</option>
					<option value="No"> No </option>
				</select>
				<button type="button" onclick='send_email();'>Submit Email</button>
				</div>
				<br>
			</form>
	</fieldset>
	<div id="output3">
	</div>
</div>
</div>
</body>