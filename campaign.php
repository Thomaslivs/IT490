<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>
<?php 
 session_start();
 $user = $_SESSION["username"];

if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
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
	<div id="main">
		<span style="font-size:30px;cursor:pointer" onclick="toggleNav()">&#9776;</span>
	</div>
	<div id="sidenav" class="sidenav" style="black">
		<a href="campaign.php"> Start Campaign</a>
		<a href="post.php"> Comment</a>
		<a href="key_threads.php"> Key Threads</a>
		<a href="key_players.php"> Key Players</a>
		<a href="finduser.php">Find User</a>
	</div>
	<div class="main">

	</div>
	<div class="content-wrapper">
		<div class="content-wrapper--inner">
			<fieldset id="field">
				<legend align="center">Start Campaign</legend>
				<form>
					<label for="subredditname"> Enter a Sub-Reddit Name</label><br>
					<input id="subredditname" type="text" name="subredditname" autocomplete="off" placeholder="Sub-Reddit Name"
					 Required><br><br>
					<label for="title"> Enter a Title</label><br>
					<input id="title" type="text" name="title" autocomplete="off" placeholder="Title" Required><br><br>
					<label for="post"> Enter a Post</label><br>
					<textarea id="post" type="text" name="post" autocomplete="off" placeholder="Post" Required></textarea><br><br>
					<label for="delay"> Enter how long to delay the Post by</label><br>
					<input id="delay" style="width: 10em;" type="number" name="delay" min="0" max="9999" autocomplete="off"
					 placeholder="Enter delay(hour)" Required><br><br>
					<button type="button" onclick='start_campaign();'>Start Campaign</button>
				</form>
			</fieldset>
			<fieldset id="field">
				<legend align="center">Output</legend>
				<font size="4">
					<div style="background-color: #FFFFFF">
						<div id="output">
						</div>
					</div>
				</font>
			</fieldset>
		</div>
	</div>
</body>

</html>