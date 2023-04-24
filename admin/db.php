<?php

//$db = mysqli_connect("localhost","root","","namuravarthe");
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$db = new mysqli($servername, $username, $password, "namuravarthe");
?>