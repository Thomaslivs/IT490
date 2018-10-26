<html>
<style>
		
		#field {width:40%;margin:auto;}
		label{display:inline-block;width:200px;margin-right:30px;text-align:right;}
		input[type=text]:focus{
			background-color: darkkhaki;}
		input[type=password]:focus{
			background-color: darkkhaki;}
		fieldset{width:500px;margin:0px auto;}
		.wrapper{text-align:center;}
		.submit{position:absolute;top:50%;}
		input, select, textarea{
    			color: black;
			}

			textarea:focus, input:focus {
    				color: yellow;
				}
			body {
				background-image: url("IT490_V4.png");
				background-repeat: no-repeat;
				background-color: yellow;
				}
	</style>
</html>
<?php
ob_start();
echo "Failed Login";
echo "<br>";
header('Refresh:5;url = login.html');
ob_end_flush();
?>
<!--- Start of the HTML and JS counter --->
<!--- Change the counter var and number in count to change the length of the count --->
<p>You will be redirected in <span id="count">5</span> seconds....</p>
<p> Click <a href="login.html">here</a> if you are not redirected....</p>

<script type="text/javascript">
window.onload = function(){
(function(){
  var counter = 5;
  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count"); // to disply the element
      span.innerHTML = counter;
    }
    if (counter === 0) { // at 0 counter is cleared
        clearInterval(counter);
    }
  }, 1000); // counting in seconds
})();
}
</script>
