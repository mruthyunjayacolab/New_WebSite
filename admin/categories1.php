<?php
session_start();
include("db.php");

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$q = mysqli_query($db,"INSERT INTO `categories`(`name`) VALUES ('$name')");

	if ($q) {
		$_SESSION['success'] = "Category Added";
		header("location:categories.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Add Category";
		header("location:categories.php");
	}
}
elseif (isset($_POST['update'])) {
	$name = $_POST['name1'];
	$rid = $_POST['rid'];
	$q = mysqli_query($db,"UPDATE `categories` SET `name`='$name' WHERE id='$rid'");

	if ($q) {
		$_SESSION['success'] = "Category Updated";
		header("location:categories.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Update Category";
		header("location:categories.php");
	}
}
elseif (isset($_POST['delete'])) {
	$rid = $_POST['rid'];
	$q = mysqli_query($db,"DELETE FROM `categories` WHERE id='$rid'");

	if ($q) {
		$_SESSION['success'] = "Category Deleted";
		header("location:categories.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Delete Category";
		header("location:categories.php");
	}
}


mysqli_close($db);
?>