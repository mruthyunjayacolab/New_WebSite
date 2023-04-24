<?php
session_start();
include("db.php");

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$q = mysqli_query($db,"INSERT INTO `breaking_news`(`news`) VALUES ('$name')");

	if ($q) {
		$_SESSION['success'] = "Breaking News Added";
		header("location:breaking_news.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Add Breaking News";
		header("location:breaking_news.php");
	}
}
elseif (isset($_POST['update'])) {
	$name = $_POST['name1'];
	$rid = $_POST['rid'];
	$q = mysqli_query($db,"UPDATE `breaking_news` SET `news`='$name' WHERE id='$rid'");

	if ($q) {
		$_SESSION['success'] = "Breaking News Updated";
		header("location:breaking_news.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Update Breaking News";
		header("location:breaking_news.php");
	}
}
elseif (isset($_POST['delete'])) {
	$rid = $_POST['rid'];
	$q = mysqli_query($db,"DELETE FROM `breaking_news` WHERE id='$rid'");

	if ($q) {
		$_SESSION['success'] = "Breaking News Deleted";
		header("location:breaking_news.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Delete Breaking News";
		header("location:breaking_news.php");
	}
}


mysqli_close($db);
?>