<?php
ob_start();
echo "Failed Login";
echo "<br>";
echo "You have tried and failed in a simple task. Our scientist have been racking their brains trying to measure your stupidity in a way you would understand . After hours of wasted time and millions of dollars spent, they have finally devised a way. You are as stupid as a Kakapo and yes this is a real animal. Its a type of parrot. Since we can’t trust you find your own way out of this website you will be redirected automatically.";
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
