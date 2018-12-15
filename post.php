<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>
<script type="text/javascript" src="sidenav.js"></script>
<script type="text/javascript" src="fns.js"></script>
<?php 
session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
?>

<body>
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
	<div class="content-wrapper">
		<a href="findid.php">
		<div class="content-wrapper--inner">
			<p>How to find a topic ID yourself!</p><a>
				<fieldset id="field">
					<legend align="center">Topic ID</legend>
					<button onclick="hidetopic()">Find Topic ID</button>
					<div id="topic" style="display: none">
						<form>
							<label for="topic01"> Enter a Topic</label><br>
							<input id="topic01" type="text" name="topic" autocomplete="off" placeholder="Topic"><br><br>
							<button type="button" onclick='comment_topic();'>Find Topic ID</button>
						</form>
						<fieldset id="field">
							<legend align="center">Results</legend>
							<div id="output1" style="width:800px;height:150px;line-height:1em;overflow:scroll;padding:5px;background-color: #FFFFFF;">
							</div>
					</div>
				</fieldset>
				</fieldset>
				<fieldset id="field">
					<legend align="center">Make Comment</legend>
					<button onclick="hide()">Make Comment</button>
					<div id="comment" style="display: none">
						<form>
							<label for="ids"> Enter a ID</label><br>
							<input id="ids" list="listofids" style="width: 50%; overflow:wrap;" placeholder="Post ID">
							<datalist id="listofids">
							</datalist>
							<div id="fulltext">
								<div>
									<label for="comment2"> Enter a Comment</label><br>
									<textarea id="comment2" rows="10" cols="100" type="text" name="comment" autocomplete="off" placeholder="Comment"></textarea><br><br>
									<button type="button" onclick='comment_post();'>Comment</button>
						</form>
				</fieldset>
				<fieldset id="field">
					<legend align="center">Output</legend>
					<div id="output2">
					</div>
					</div>
</div>
</div>
	</fieldset>
</body>

</html>