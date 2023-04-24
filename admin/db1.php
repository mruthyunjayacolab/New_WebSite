<?php

//$db = mysqli_connect("localhost","unitedne_nammur2","","unitedne_nammuravarthe2");
?>
<?php
$servername = "localhost";
$username = "srisadgu_nammur2";
$password = "Sadguru@0987";

// Create connection

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$db = new mysqli($servername, $username, $password, "srisadgu_nammuravarthe2");
?>