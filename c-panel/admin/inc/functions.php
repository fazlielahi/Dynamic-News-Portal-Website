<?php

	// ADMIN PANEL FUNCTIONS
	
	// Authentication, to check and redirect if user is not logged in
	
	function authenticate()
	{	
		if(!isset($_SESSION['member_email']) && !isset($_COOKIE['member_id']))
		{
			redirect("../index.php?msg=Session Expired Please Login", "Session Expired Please Login ", "error");
		}
	}
	
	// members profile
	
	if(isset($_SESSION['member_email']))
	{
		$member_email = $_SESSION['member_email'];
		
	}else
	{
		$member_email = "";
	}
	
	function member_profile()
	{
		global $connection;
		global $member_email;
		
		$profile_sql = "SELECT * FROM members
							WHERE status = 1
							AND
							email = '$member_email'
							
							";
							
		$profile_query = mysqli_query($connection, $profile_sql);
		
		$profile = mysqli_fetch_assoc($profile_query);
			
		return $profile;
	}
	
	// members query
	
	function get_members($all = null, $id = null,
						$email = null, $password = null,
						$start = null, $limit = null )
	{
		global $connection;
		$all_members = Array();
		
		if($all == "all_members")
		{
			$members_sql = "SELECT * FROM members
							WHERE status = 1
							ORDER BY id DESC
							LIMIT $start, $limit ";
			
			$members_query = mysqli_query($connection, $members_sql);
			
			while($members = mysqli_fetch_assoc($members_query))
			{
				array_push($all_members, $members);
			}
		
		return $all_members;
							
		}else if($all == "login_info")
		{
		
			$members_sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password' ";
			$members_query = mysqli_query($connection, $members_sql);
			
			return $members_query;
			
		}		
	}
	
	// 	Categories CRUD queries
	// -----------------------------------
	
	function crud_categ($query = null, $categ_id = null, $title = null, $cover = null, $status = null)
	{
		global $connection;
		
		if($query == 'insert')
		{
			$sql = "INSERT INTO categories
					SET 
					title = '$title',
					cover = '$cover',
					status = '$status'			
			";
			
			$query = mysqli_query($connection, $sql);
			return $query;
			
		}else if($query == 'update')
		{
			$sql = "UPDATE categories
					SET 
					title = '$title',
					cover = '$cover',
					status = '$status'
					
					WHERE
					id = '$categ_id'
			";
			
			$query = mysqli_query($connection, $sql);
			return $query;
			
		}else if($query == 'delete')
		{
			$sql = "DELETE FROM categories
					
					WHERE
					id = '$categ_id'
			";
			
			$query = mysqli_query($connection, $sql);
			return $query;
		}
	}
	
	// 	News CRUD queries
	// -----------------------------------
	
	function crud_news($query = null, $news_id = null,
						$title = null, $text = null, $image = null, $category_id = null, $created_at = null, $author_id = null, $status = null)
	{
		global $connection;
		
		if($query == 'insert')
		{
				$sql = "INSERT INTO news
					SET 
					title = '$title',
					text = '$text',
					image = '$image',
					category_id = '$category_id',
					created_at = '$created_at',
					author_id = '$author_id'
			";
			
			$query = mysqli_query($connection, $sql);
			return $query;
			
		}else if($query == 'update')
		{
			$sql = "UPDATE news
					SET 
					title = '$title',
					text = '$text',
					image = '$image',
					status = '$status'
					
					WHERE
					id = '$news_id'
			";
			
			$query = mysqli_query($connection, $sql);
			
			//die(mysqli_error($connection));
			return $query;
			
		}else if($query == 'delete')
		{
			$sql = "DELETE FROM news
					
					WHERE
					id = '$news_id'
			";
			
			$query = mysqli_query($connection, $sql);
			
			//die(mysqli_error($connection));
			return $query;
		}
	} 
	
	// 	Member CRUD queries
	// -----------------------------------
	
	function crud_mem($query = null, $news_id = null, $firstname = null, $lastname = null,
		$email = null, $password = null, $phone = null, $gender = null, $address = null,
		$photo = null, $dob = null, $role = null)
	{
		global $connection;
		
		if($query == 'insert')
		{
				$sql = "INSERT INTO members
					SET 
					firstname = '$firstname',
					lastname = '$lastname',
					email = '$email',
					password = '$password',
					phone = '$phone',
					gender = '$gender',
					address = '$address',
					photo = '$photo',
					date_of_birth = '$dob',
					role = '$role'					
			";
			
			$query = mysqli_query($connection, $sql);
			return $query;
			
		}else if($query == 'update')
		{
			$sql = "UPDATE news
					SET 
					title = '$title',
					text = '$text',
					image = '$image',
					status = '$status'
					
					WHERE
					id = '$news_id'
			";
			
			$query = mysqli_query($connection, $sql);
			
			//die(mysqli_error($connection));
			return $query;
			
		}else if($query == 'delete')
		{
			$sql = "DELETE FROM news
					
					WHERE
					id = '$news_id'
			";
			
			$query = mysqli_query($connection, $sql);
			
			//die(mysqli_error($connection));
			return $query;
		}
	} 
	
	// total news categories and members
	
	function total($all, $categ_id)
	{

		global $connection;

		if($all == "total_news")
		{
			$total_sql = "SELECT COUNT(title) AS news_total FROM news WHERE status = 1";
			
		}else if($all == "total_categ")
		{
			$total_sql = "SELECT COUNT(title) AS categ_total FROM categories WHERE status = 1";
			
		}else if($all == "total_members")
		{
			$total_sql = "SELECT COUNT(firstname) AS members_total FROM members WHERE status = 1";
			
		}else if($all == "categ_newstotal")
		{
			$total_sql = "SELECT COUNT(title) AS news_total FROM news WHERE category_id = $categ_id";
		}
		
		$query = mysqli_query($connection, $total_sql);
		
		$total = mysqli_fetch_assoc($query);
		
		return $total;
	}
	
	//get categ combo
	
	function get_categ_combo()
	{
		global $connection;
		
		$sql = "SELECT * FROM categories WHERE status = 1 ";
		$query = mysqli_query($connection, $sql);
			
			while($categ = mysqli_fetch_assoc($query))
			{
				echo "<option value='$categ[id]'> $categ[title] </option>";
			}
		
	}
	
?>

	