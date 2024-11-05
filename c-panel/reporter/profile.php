<?php

	//ADMIN PANEL Members PAGE

	session_start();
	include("../../inc/database.php");
	include("../../inc/functions.php"); /* functions public view */
	include("../../inc/functions-general.php");
	$dir_images = "../../images/";
	
	include("../admin/inc/functions.php"); /* functions admin panel */
	
	authenticate();
	
	
	if(isset($_GET['start']))
	{
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
	
	$limit = 9;
	
	$nextpage = $limit + $start;
	
	$previouspage = $start - $limit;
	
?>

<?php

	$mem = member_profile(); 
	$box_one = "";
	$box_sencond = "";
	
	$member_id = $mem['id'];
	
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
	
	$box_one .= "
	
			<div id='box_one'>
				<div class='image'>
					$image
				</div>
				<h3 class='username'> $mem[firstname] $mem[lastname] </h3>
				<span class='role'> $role </span>
				<a href='#' class='profile_btn'> Edit Profile </a>
				<a href='#' class='message_btn'> Message </a>
			</div>
	
			";
	
	$box_sencond .= "
	
			<tr>
				<th style='border-top: 0;'> Fullname </th> 
				<td style='border-top: 0;'> $mem[firstname] $mem[lastname] 
				</td> 
			</tr>
			<tr><th> Email </th> <td> $mem[email] </td> </tr>
			<tr><th> Gender </th>  <td> $mem[gender] </td> </tr>
			<tr><th> DOB </th> <td> $mem[date_of_birth] </td> </tr>
			<tr><th> Phone </th> <td> $mem[phone] </td> </tr>
			<tr>
				<th rowspan='2'> Address </th> <td> $mem[address] </td>
			</tr>
	
			";


	$news_list = "";

	$all_news = get_news('all_news_member', $member_id, $limit, $start); //for member news
	//var_dump($all_news);
	foreach($all_news as $news)
	{
		if(is_file($dir_images . "news/thumb/" . $news['image']))
		{
			$image = " <div class='image'>
							<a href='news.php?id=$news[id]&type=news' >
								<img src='$dir_images/news/thumb/$news[image]' />
							</a>
						</div> ";
						
		}else
		{
			$image = " <div class='image'>
							<a href='news.php?id=$news[id]&type=news' >
								<img src='$dir_images/default.png'' />
							</a>
						</div> ";
		}
					
			$news_list .= "
				
				<div class='news_box'>
					<a href='news.php?id=$news[id]&type=news' > $image	</a> 
						
					<span class='categ_name'> $news[categ_title] </span>
					
					<a href='news.php?id=$news[id]&type=news' class='text-dark title-news'>" .
						substr($news['title'], 0, 70) . "...
					</a> 
				</div>
	
				";
	}
	

?>

<html>

	<head>
		<title> Profile </title>
		<link rel='stylesheet' href='../../lib/bootstrap-4.6.0-dist/css/bootstrap.min.css' />
		<link rel='stylesheet' href='../../lib/fontawesome-free-6.4.2-web/css/all.min.css' />
		<link rel='stylesheet' href='styles/header.css' />
		<link rel='stylesheet' href='styles/profile.css' />
	</head>
	
	<body>
	
		<?php include("inc/header.php") ?>
		
		<div class='content' id="content_heading">
		
			<h3 class="c_heading" style=""> &nbsp; Profile </h3>
			
			<div class="profile" id="profile">
				<a href="news.php">
					<img src='../../images/leftarrow.png'
						style="width: 20px; margin-top: 160px; margin-left: 60px;"/>
				</a>
				<?php echo $box_one ?>
				
				<div class="box_sencond" id="second_box">
					<table class="table">
						<?php echo $box_sencond ?>
					</table>
				</div>
			</div>
				<?php //for total member news
	
					$sql = "SELECT * FROM news where status = 1 AND author_id = '$member_id'";
					$query = mysqli_query($connection, $sql);
					$total_news = mysqli_num_rows($query);
					
				?>
				
				<h2 class="entries_heading" id="my_entries">
					My Entries <span class="total-news"> <b> Total </b> <?php echo $total_news ?> </span>
				</h2>

				<div class="member-news">
					<?php echo $news_list ?>
					<div> </div>
					<?php
				
						if($previouspage >= 0)
						{
							echo "<a href='profile.php?start=$previouspage&#my_entries'> 
									<img src='../images/leftarrow.png' class='arrow-icon'/>  
								 </a>";	
						}else{
						
							echo "<a href='#' style='visibility: hidden;'> 
									<img src='../images/leftarrow.png' class='arrow-icon'/>
								  </a>";
						}				
				
						if($nextpage < $total_news)
						{
							echo "<a href='profile.php?start=$nextpage&#my_entries'> 
									<img src='../images/rightarrow.png' class='arrow-icon'/>
								  </a>";
						}else{
							
							echo "<a href='#' style='visibility: hidden;'> 
									<img src='../images/rightarrow.png' class='arrow-icon'/>
								  </a>";
							
						}
				?>
				</div>
				
			</div>
			
		<script>
		
			
			
			
			var content_heading = document.querySelector(".c_heading");
			
			burger.addEventListener("click", function table_div()
			{
				if(content_heading.className == "c_heading")
				{
					content_heading.classList.add("content-heading");
					
				}else
				{
					content_heading.classList.remove("content-heading");
				}
				
				if(profile.className == "profile")
				{		
					profile.classList.add("profile-new");
					second_box.classList.add("second-box-new");
					
				}else
				{
					profile.classList.remove("profile-new");
					second_box.classList.remove("second-box-new");
					//alert("xyz");
				}
			});

		</script>
		
		<script src="../lib/fontawesome-free-6.4.2-web/js/all.min.js"></script>
		
	</body>

</html>