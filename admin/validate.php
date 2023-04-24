<?php
session_start();
unset($_SESSION['success']);
unset($_SESSION['error']);

include("db.php");

$un = $_POST["username"];
$pw = $_POST["password"];

$q = mysqli_query($db,"SELECT * FROM `admin` WHERE username='$un' and password='$pw'");
if(mysqli_num_rows($q)>0)
{
	$_SESSION['status']="Active";
	$_SESSION['success'] = "Username and Passward are Valid";
	header("location:dashboard.php");
}
else
{
	$_SESSION['error'] = "Username and Passward are not Valid";
	header("location:login.php");
}

mysqli_close($db);
?>