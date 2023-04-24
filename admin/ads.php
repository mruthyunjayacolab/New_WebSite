<?php

session_start();
include 'db.php';

if (isset($_POST['adds'])) {
    
$status=$_POST['type'];

 $file = rand(1000,100000)."-".$_FILES['adp']['name'];
				 $file_loc = $_FILES['adp']['tmp_name'];
				$file_size = $_FILES['adp']['size'];
				$file_type = $_FILES['adp']['type'];
				$folder="advrt/";
				
				// new file size in KB
				$new_size = $file_size/1024;  
				// new file size in KB
				
				// make file name in lower case
				$new_file_name = strtolower($file);
				// make file name in lower case
				
				$final_file=str_replace(' ','-',$new_file_name);
				if(move_uploaded_file($file_loc,$folder.$final_file))
				{
				$q=	mysqli_query($db,"INSERT INTO `ads`(`ads`, `id`,`status`) VALUES ('$final_file','0','$status')");
				//	echo "INSERT INTO `ads`(`ads`, `id`,`status`) VALUES ('$final_file','0','$status')";
					
				}
					

	if ($q) {
		$_SESSION['success'] = "Category Updated";
		header("location:advertisement.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Update Category";
		header("location:categories.php");
	}




}
?>

