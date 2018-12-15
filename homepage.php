<!DOCTYPE html>
<html>

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
	<div class="header">
		<h3 class="text-pop-up-top">	<?php echo "WELCOME, " .$_SESSION["username"];?> <br> </h3>
		<p class="headerbody">This is the homepage for Null Breaker's Reddit Social Media Aggregator.</p>
</div>
	<!--- Start of the JS to make navbar sticky --->
	<script>
		window.onscroll = function () {
			myFunction()
		};

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