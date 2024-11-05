<?php

	//ADMIN PANEL News PAGE

	session_start();
	include("../../inc/database.php");
	include("../../inc/functions.php"); /* functions public view */
	include("../../inc/functions-general.php");
	$dir_images = "../../images/news/";
	
	include("../admin/inc/functions.php"); /* functions admin panel */
	
	authenticate();
	
	if(isset($_GET['start']))
	{
		$start = $_GET['start'];
	}else
	{
		$start = 0;
	}
	
	$limit = 20;
	
	$nextpage = $start + $limit;
	$previouspage = $start - $limit;
	
?>

<?php

	$all_news = get_news("all_news", "", $limit, $start); 
	$news_list = "";
	$sno = 0;
	
	foreach($all_news as $news)
	{
		$sno++;
		
		$news_list .= "
		
			<tr>
				<td class='sno-td'> $sno </td>
				<td class='newstitle-td'>" . substr($news['title'], 0, 50) . " ... </td>
				<td class='author-td'> $news[firstname] </td>  <!-- Author name --> 
				<td class='category-td'> $news[categ_title] </td>  <!-- category name --> 
				<td class='datetime-td'>  " .  $news['created_at'] .  " </td>
				<td class='modify-td'> <a href='news.php?edit_id=$news[id]' onclick='hide_create_btn()'> 
					<img src='../../images/edit.png'/> 
				</td>
				<td class='modify-td'> <a href='news.php?dlt_id=$news[id]' onclick='hide_create_btn()'>
					<img src='../../images/delete.png'/>  
				</td>
			</tr>
		
		";
	}

?>

<html>

	<head>
		<title> All News </title>
		<link rel='stylesheet' href='../../lib/bootstrap-4.6.0-dist/css/bootstrap.min.css' />
		<link rel='stylesheet' href='../../lib/fontawesome-free-6.4.2-web/css/all.min.css' />
		<link rel='stylesheet' href='styles/header.css' />
		<link rel='stylesheet' href='styles/news.css' />
		<link rel='stylesheet' href='styles/news-new.css' />
		<link rel='stylesheet' href='../admin/styles/news-edit.css' />
		<link rel='stylesheet' href='../admin/styles/news-dlt.css' />
	</head>
	
	<body>
	
		<?php include("inc/header.php") ?>
		
			<h3 class="c_heading" id="content_heading"> &nbsp; News  <?php echo  show_msg() ?>
			
				<?php 
					if(!isset($_GET['dlt_id']) && !isset($_GET['edit_id']))
					{
						echo 	"<span onclick='show_add_news()' class='btn create_btn'>
									Create new 
								</span>";
					}
				?>

			</h3>
			
			<div class="container ">
			
				<table class="table table-light table-hover" id="table">
					<tr class="header-row">
					
						<th class="sno-th" id="sno_th"> Sno </th>
						<th class="newstitle-th" id="news_title_th"> News title </th>
						<th class='author-th'> Author </th>
						<th class='category-th'> Category </th>
						<th class="datetime-th" id="datetime_th"> Created on </th>
						<th class="modify-th" colspan='2'> Modify </th>
					
					</tr>
					
					<?php echo $news_list; ?>
					
					<tr>
						<th> </th>
					</tr>
					
					<tr>
					
					<th >
					</th>
					<th colspan="2" class="previous-th">
					<?php 
				
						if($previouspage >= 0)
						{
							echo "<a href='news.php?start=$previouspage'> 
									<img src='../../images/leftarrow.png' class='arrow-icon'/>  
								 </a>";	
						}else{
						
							echo "<a href='#' style='visibility: hidden;'> 
									<img src='../../images/leftarrow.png' class='arrow-icon'/>
								  </a>";
						}
					?>
					</th>
					
					<th colspan='3' >
					<?php
				
					$sql = "SELECT * FROM news where status = 1";
					$query = mysqli_query($connection, $sql);
					$total_news = mysqli_num_rows($query);
				
					if($nextpage < $total_news)
					{
						echo "<a href='news.php?start=$nextpage'> 
								<img src='../../images/rightarrow.png' class='arrow-icon'/>
							  </a>";
					}else{
						
						echo "<a href='#' style='visibility: hidden;'> 
								<img src='../../images/rightarrow.png' class='arrow-icon'/>
							  </a>";
						
					}
				?>
				</th>
				<th>
				</th>
				<tr />
				</table>
			</div>	
	
		<?php 
			
			//for News edit
	
			if(!isset($_GET['edit_id']))
			{
				$edit_id = "";
			}else
			{
				$edit_id = $_GET['edit_id'];
				$news = get_news("", $edit_id);
			
				if(is_file($dir_images . "large/" . $_SESSION['pre_image'] = $news['image']))
				{
					$image = "<img src='$dir_images/large/$news[image]' />";
					
				}else{
					
					$image = "<img src='$dir_images/default.jpg' />";
				}
				
				include("../admin/news-edit.php");
				
			}
		?>
		
		<?php 
			
			//for category Delete
	
			if(!isset($_GET['dlt_id']))
			{
				$dlt_id = "";
			}else
			{
				$dlt_id = $_GET['dlt_id'];
				$news = get_news("", $dlt_id);
			
				if(is_file($dir_images . "large/" . $_SESSION['pre_image'] = $news['image']))
				{
					$image = "<img src='$dir_images/large/$news[image]' />";
					
				}else{
					
					$image = "<img src='$dir_images/default.jpg' />";
				}
				
				include("../admin/news-delete.php");
			}
		?>

		
		<?php include("../admin/news-new.php") ?>
		
	
		<script src="../admin/js/news.js" > </script>
		<script src='../../lib/fontawesome-free-6.4.2-web/js/all.min.js' > </script>
	
	</body>

</html>