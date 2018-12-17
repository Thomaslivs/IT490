<head>
	<link rel="stylesheet" href="styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
session_start();
$user  = $_SESSION["username"];
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
?>
<script>
var user1 = "<?php echo $user; ?>";
</script>
<body>
	<script type="text/javascript" src="sidenav.js"></script>
	<script type="text/javascript" src="fns.js"></script>

	<div id="nav">
		<ul>
			<li><a href="/homepage.php">Home</a></li>
			<li><a href="/Reddit_Interface.php">Reddit Interface</a></li>
			<li><a href="/showgraph.php">Campiagn Graph</a></li>
			<li><a href="/user.php">User</a></li>
			<li><a href="/setting.php">Setting</a></li>
			<li><a href="/logout.php">Log Out</a></li>
		</ul>
	</div>


	<div class="content-wrapper">
		<div class="content-wrapper--inner">
			<div class="content-title text-pop-up-top">
				<h4>Graphs</h4>
			</div>
			<div class="content-subtitle">
	</div>
			<fieldset id="field">
				<legend align="center">Find User</legend>
				<form>
					<label for="graph"> Select to show based on Karma or Comments</label><br>
					<select id="kc">
								<option value="karma">Karma</option>
								<option value="comments"> Comments </option>
							</select>
							<button type="button" onclick='make_graph();'>Make Graph</button>
				</form>
			</fieldset>
			<fieldset id="field">
				<legend align="center">Output</legend>
					<div id="output2"></div>
		</div>
	</div>
	</fieldset>
</body>
