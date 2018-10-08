<?php
ob_start();
echo "Failed Login";
echo "<br>";
header('Refresh:10;url = login.html');
ob_end_flush();
?>
<!--- Start of the HTML and JS counter --->
<!--- Change the counter var and number in count to change the length of the count --->
<p>You will be redirected in <span id="count">10</span> seconds....</p>
<p> Click <a href="login.html">here</a> if you are not redirected....</p>

<script type="text/javascript">
window.onload = function(){
(function(){
  var counter = 10;
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
