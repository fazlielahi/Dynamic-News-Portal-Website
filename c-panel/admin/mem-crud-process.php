<?php

	//ADMIN PANEL News CRUD PROCESS PAGE

	session_start();
	include("../../inc/database.php");
	include("../../inc/functions.php"); /* functions public view */
	include("../../inc/functions-general.php");
	$dir_images = "../../images/news/large/";
	
	include("inc/functions.php"); /* functions admin panel */
	
	authenticate();
	
?>

<?php

	if(isset($_POST['query']))
	{
		$_SESSION['query'] = $_POST['query'];
	}else
	{
		$_SESSION['query'] = "";
	}
	
	if($_SESSION['query'] == "insert") /* --------------------- Insert query -------------------- */
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$role = $_POST['role'];
		
		// Photo upload
		
			if(!empty($_FILES['photo']))
			{
				$photo_name = $_FILES['photo']['name'];
				$photo_tmp_name = $_FILES['photo']['tmp_name'];
				
				$photo_newname = time() . $photo_name;
				
				$upload = move_uploaded_file($photo_tmp_name, $dir_images . $photo_newname);
				
				if(!$upload)
				{
					die("Error uploading image");
				}
				
			}	
		
		$query = crud_mem($_SESSION['query'], "", $firstname, $lastname, $email, $password, $phone, $gender, $address, $photo_newname, $dob, $role);
	
		if(!$query)
		{
			redirect("members.php", "Error: Something went wrong in member registration", "error");
		}else
		{
			redirect("members.php", "Successfully Registered member", "success");
		}
		
		// ----------------
		
	}else if($_SESSION['query'] == "update") /* --------------------- Update query -------------------- */
	{
		$title = $_POST['title'];
		$text = $_POST['text'];
		$status = $_POST['status'];
		$categ_id = $_POST['category_id'];
		$news_id = $_POST['news_id'];
		
			//Image Update
		
			if(!empty($_FILES['image']))
			{
				$img_name = $_FILES['image']['name'];
				$img_tmp_name = $_FILES['image']['tmp_name'];
				//echo $img_tmp_name = $_FILES['image']['size'];
				//echo $img_tmp_name = $_FILES['image']['type'];
				//echo $img_tmp_name = $_FILES['image']['error'];
				
				$img_newname = time() . $img_name;
				
				$upload = move_uploaded_file($img_tmp_name, $dir_images . $img_newname);
				
				if(!$upload)
				{
					die("Error uploading image");
				}else
				{
					if(is_file($dir_images . $_SESSION['pre_image']))
					{
						unlink($dir_images . $_SESSION['pre_image']);
					}
				}
				
			} 	
	
		$query = crud_news($_SESSION['query'], $news_id, $title, $text, $img_newname, $categ_id, "", $status);
	
		if(!$query)
		{
			redirect("news.php", "Error: News can't be updated", "error");
			
		}else
		{
			redirect("news.php", "Successfully updated News", "success");
		}
		
		// ----------------
		
	}else if($_SESSION['query'] == "delete") /* --------------------- Delete query -------------------- */
	{
		$news_id = $_POST['news_id'];
		
		$query = crud_news($_SESSION['query'], $news_id, "", "", "", "", "");
		
		if(!$query)
		{
			redirect("news.php", "Error: News can't be Deleted", "error");
			
		}else
		{
			redirect("news.php", "Successfully Deleted News", "success");
		}
	}
?>