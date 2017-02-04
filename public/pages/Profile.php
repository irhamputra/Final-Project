<hr>
<div class="container">
<?php

echo "<h4>Hi! " . $_SESSION['username'] . ", you are logged in!</h4> <br>";

// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('UTC');
echo "<p>Your log in time: <br>";
echo date('l jS \of F Y ');
echo "</p>"
?>
</div>