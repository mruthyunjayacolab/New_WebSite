<?php
session_start();
include("db.php");

$name = $_POST['name'];
$password = $_POST['password'];

$q = mysqli_query($db,"UPDATE `admin` SET `username`='$name',`password`='$password' WHERE 1");
if ($q) {
	if ($q) {
		$_SESSION['success'] = "Profile Updated";
		header("location:dashboard.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Update Profile";
		header("location:dashboard.php");
	}
}
mysqli_close($db);
?>