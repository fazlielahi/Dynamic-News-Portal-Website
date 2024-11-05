<?php

	//ADMIN PANEL CATEGORIES CRUD PROCESS PAGE

	session_start();
	include("../../inc/database.php");
	include("../../inc/functions.php"); /* functions public view */
	include("../../inc/functions-general.php");
	$dir_images = "../../images/categories/";
	
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
	
	$dir_images = "../images/categories/";
	
	//die();
	
	if($_SESSION['query'] == "insert") /* --------------------- Insert query -------------------- */
	{
		$title = $_POST['title'];
		$status = $_POST['status'];
		
		// Image upload
		
			if(!empty($_FILES['cover']))
			{
				$img_name = $_FILES['cover']['name'];
				$img_tmp_name = $_FILES['cover']['tmp_name'];
				//echo $img_tmp_name = $_FILES['cover']['size'];
				//echo $img_tmp_name = $_FILES['cover']['type'];
				//echo $img_tmp_name = $_FILES['cover']['error'];
				
				$img_newname = time() . $img_name;
				
				$upload = move_uploaded_file($img_tmp_name, $dir_images . $img_newname);
				
				if(!$upload)
				{
					$_SESSION['IMAGE ERROR'] = "Error: Uploading image";
				}
				
			}	
		
		$query = crud_categ($_SESSION['query'], "", $title, $img_newname, $status);
		
		if(!$query)
		{
			redirect("categ-new.php", "Error: Something went wrong in Insertion category" . $_SESSION['IMAGE ERROR'], "error");
		}else
		{
			redirect("categories.php", "Successfully Added a Category " .$_SESSION['IMAGE ERROR'], "success");
		}
		
		// ----------------
		
	}else if($_SESSION['query'] == "update") /* --------------------- Update query -------------------- */
	{
		$title = $_POST['title'];
		$status = $_POST['status'];
		$categ_id = $_POST['categ_id'];
		
			//Image Update
		
			if(!empty($_FILES['cover']['name']))
			{
				$img_name = $_FILES['cover']['name'];
				$img_tmp_name = $_FILES['cover']['tmp_name'];
				//echo $img_tmp_name = $_FILES['cover']['size'];
				//echo $img_tmp_name = $_FILES['cover']['type'];
				//echo $img_tmp_name = $_FILES['cover']['error'];
				
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

		$query = crud_categ($_SESSION['query'], $categ_id, $title, $img_newname, $status);			
		
		if(!$query)
		{
			redirect("categ-edit.php", "Error: Category can't be updated", "error");
			
		}else
		{
			redirect("categories.php", "Successfully updated Category", "success");
		}
		
		// ----------------
		
	}else if($_SESSION['query'] == "delete") /* --------------------- Delete query -------------------- */
	{
		$categ_id = $_POST['categ_id'];
		
		$query = crud_categ($_SESSION['query'], $categ_id, "", "", "");
		
		if(!$query)
		{
			redirect("categ-delete.php", "Error: Category can't be Deleted", "error");
			
		}else
		{
			redirect("categories.php", "Successfully Deleted Category", "success");
		}
	}
?>