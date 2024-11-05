<?php

	//ADMIN PANEL Members PAGE

	session_start();
	include("../../inc/database.php");
	include("../../inc/functions.php"); /* functions public view */
	include("../../inc/functions-general.php");
	$dir_images = "../../images/";
	
	include("inc/functions.php"); /* functions admin panel */
	
	authenticate();
	
	if(isset($_GET['start']))
	{
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
	
	$limit = 2;
	
	$nextpage = $limit + $start;
	
	$previouspage = $start - $limit;
	
?>

<?php

	$all_mem = get_members("all_members", "", "", "", $start, $limit); 
	$user_box = "";
	
	foreach($all_mem as $mem)
	{
		if(is_file($dir_images . "users/" . $mem['photo']))
		{
			$image = "<img src='$dir_images/users/$mem[photo]'/>";
		}else{
			
			$image = "<img src='$dir_images/users/default.png'/>";
		}
		
		if($mem['role'] == 1)
		{
			$role = "Administrator";
			
		}else{
			
			$role = "Reporter";
		}
		
		$user_box .= "
		
				<div id='user_box'>
					<div class='image'>
						$image
					</div>
					<h3 class='username'> $mem[firstname] $mem[lastname] </h3>
					<span class='role'> $role </span>
					<a href='#' class='profile_btn'> Profile </a>
				</div>
		
		";
	}

?>

<html>

	<head>
		<title> Members </title>
		<link rel='stylesheet' href='../../lib/bootstrap-4.6.0-dist/css/bootstrap.min.css' />
		<link rel='stylesheet' href='../../lib/fontawesome-free-6.4.2-web/css/all.min.css' />
		<link rel='stylesheet' href='styles/template.css' />
		<link rel='stylesheet' href='styles/members.css' />
		<link rel='stylesheet' href='styles/mem-new.css' />
	</head>
	
	<body>
	
		<?php include("inc/template.php") ?>
		
		<div class='content' id="content_heading">
		
			<h3 class="c_heading" style=""> &nbsp; Members <?php echo  show_msg() ?>
				<a class="btn create_btn" onclick="show_member_add()"> Register new </a>
			</h3>
			
			<div class="users-sec" id="users_sec">
				
				<?php 
				
					if($previouspage >= 0)
					{
						echo "<a href='members.php?start=$previouspage'> 
								<img src='../../images/leftarrow.png' class='arrow-icon'/>
						      </a>";
					}else{
						
						echo "<a href='#' style='opacity: 0;'> 
								<img src='../../images/leftarrow.png' class='arrow-icon'/>
						      </a>";
						
						
					}
				?>
				
				<?php echo $user_box ?>
				
				<?php 
				
					$sql = "SELECT * FROM members where status = 1";
					$query = mysqli_query($connection, $sql);
					$total_members = mysqli_num_rows($query);
				
					if($nextpage < $total_members)
					{
						echo "<a href='members.php?start=$nextpage'> 
								<img src='../../images/rightarrow.png' class='arrow-icon'/>
							  </a>";
					}else{
						
						echo "<a href='#' style='opacity: 0;'> 
								<img src='../../images/rightarrow.png' class='arrow-icon'/>
							  </a>";
						
					}
				?>
			</div>

			<?php include("member-new.php"); ?>
			
		<script src='../../lib/fontawesome-free-6.4.2-web/js/all.min.js' > </script>
		<script src="js/member.js"></script>
		
	</body>

</html>