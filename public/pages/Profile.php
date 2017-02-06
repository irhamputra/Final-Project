<hr>
<div class="container">
<?php

echo "<h4>Hi! " . $_SESSION['username'] . ", you are logged in!</h4> <br>";

$t=time();
echo($t . "<br>");
echo(date("Y-m-d",$t));

?>
    <pre>
        <?php print_r($_SESSION) ?>
    </pre>
</div>