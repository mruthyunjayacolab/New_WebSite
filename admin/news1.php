<?php
session_start();
include("db.php");

if (isset($_POST['add'])) {
	$title = $_POST['title'];
	$caption = $_POST['caption'];
	$desc1 = $_POST['desc1'];
	$desc2 = $_POST['desc2'];
	$youtube = $_POST['youtube'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$cat = $_POST['cat'];

	$output = '';  
	 if(is_array($_FILES))   
	 {  
	      foreach ($_FILES['images']['name'] as $name => $value)  
	      {  
	           $file_name = explode(".", $_FILES['images']['name'][$name]);  
	           $allowed_ext = array("jpg", "jpeg", "png", "gif");  
	           if(in_array($file_name[1], $allowed_ext))  
	           {  
	               
	                $old_name = md5(rand()) . '.' . $file_name[1]; 
	                $x = strlen($old_name)-8;
	                $y = strlen($old_name);
	                $new_name = substr($old_name,$x,$y); 
	                $sourcePath = $_FILES['images']['tmp_name'][$name];  
	                $targetPath = "news_images/".$new_name;  
	                $target = "news_images/";
	                $output = $output.",".$new_name;
	                if(move_uploaded_file($sourcePath, $targetPath))  
	                {  
	                    
	                }                 
	           }            
	      }  
	 
	 } 

	$file = rand(1000,100000)."-".$_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$file_size = $_FILES['image']['size'];
	$file_type = $_FILES['image']['type'];
	$folder="news_images/";
	$new_size = $file_size/1024;  
	$new_file_name = strtolower($file);		
	$final_file=str_replace(' ','-',$new_file_name);
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
	}

	$q = mysqli_query($db,"INSERT INTO `news`(`category`, `title`, `image`, `caption`, `description1`, `images`, `description2`, `video_link`, `news_date`, `news_time`) VALUES ('$cat','$title','$final_file','$caption','$desc1','$output','$desc2','$youtube','$date','$time')");
	if ($q) {
		$_SESSION['success'] = "News Added";
		header("location:news.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Add News";
		header("location:news.php");
	}
}
elseif (isset($_POST['update'])) {
	$id = $_POST['rid'];
	$title = $_POST['title'];
	$caption = $_POST['caption'];
	$desc1 = $_POST['desc1'];
	$desc2 = $_POST['desc2'];
	$youtube = $_POST['youtube'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$cat = $_POST['cat'];
	$new_file = $_FILES['image']['name'];

	$output = '';  
	 if(is_array($_FILES))   
	 {  
	      foreach ($_FILES['images']['name'] as $name => $value)  
	      {  
	           $file_name = explode(".", $_FILES['images']['name'][$name]);  
	           $allowed_ext = array("jpg", "jpeg", "png", "gif");  
	           if(in_array($file_name[1], $allowed_ext))  
	           {  
	               
	                $old_name = md5(rand()) . '.' . $file_name[1]; 
	                $x = strlen($old_name)-8;
	                $y = strlen($old_name);
	                $new_name = substr($old_name,$x,$y); 
	                $sourcePath = $_FILES['images']['tmp_name'][$name];  
	                $targetPath = "news_images/".$new_name;  
	                $target = "news_images/";
	                $output = $output.",".$new_name;
	                if(move_uploaded_file($sourcePath, $targetPath))  
	                {  
	                    
	                }                 
	           }            
	      }  
	 
	 } 

	$file = rand(1000,100000)."-".$_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$file_size = $_FILES['image']['size'];
	$file_type = $_FILES['image']['type'];
	$folder="news_images/";
	$new_size = $file_size/1024;  
	$new_file_name = strtolower($file);		
	$final_file=str_replace(' ','-',$new_file_name);
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
	}

	if($new_file == "" && $output == "")
	{
		$qry = mysqli_query($db,"UPDATE `news` SET `category`='$cat',`title`='$title',`caption`='$caption',`description1`='$desc1',`description2`='$desc2',`video_link`='$youtube',`news_date`='$date',`news_time`='$time' WHERE id='$id'");
	}
	elseif ($new_file == "" && $output != "") {
		$qry = mysqli_query($db,"UPDATE `news` SET `category`='$cat',`title`='$title',`caption`='$caption',`description1`='$desc1',`description2`='$desc2',`video_link`='$youtube',`news_date`='$date',`news_time`='$time',images='$output' WHERE id='$id'");
	}
	elseif ($new_file != "" && $output == "") {
		$qry = mysqli_query($db,"UPDATE `news` SET `category`='$cat',`title`='$title',`caption`='$caption',`description1`='$desc1',`description2`='$desc2',`video_link`='$youtube',`news_date`='$date',`news_time`='$time',image='$final_file' WHERE id='$id'");
	}
	elseif ($new_file != "" && $output != "") {
		$qry = mysqli_query($db,"UPDATE `news` SET `category`='$cat',`title`='$title',`caption`='$caption',`description1`='$desc1',`description2`='$desc2',`video_link`='$youtube',`news_date`='$date',`news_time`='$time',image='$final_file',images='$output' WHERE id='$id'");
	}
	if ($qry) {
		$_SESSION['success'] = "News Added";
		header("location:news.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Add News";
		header("location:news.php");
	}	
}
elseif (isset($_POST['delete'])) {
	$id = $_POST['rid'];
	$q = mysqli_query($db,"DELETE FROM `news` WHERE id = '$id'");
	if ($q) {
		$_SESSION['success'] = "News Deleted";
		header("location:news.php");	
	}
	else
	{
		$_SESSION['error'] = "Unable to Delete News";
		header("location:news.php");
	}
}

mysqli_close($db);
?>