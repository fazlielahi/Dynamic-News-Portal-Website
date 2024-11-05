<?php

	//ADMIN PANEL Dashboard PAGE

	session_start();
	include("../../inc/database.php");
	include("../../inc/functions.php"); /* functions public view */
	include("../../inc/functions-general.php");
	$dir_images = "../../images/";
	
	include("inc/functions.php"); /* functions admin panel */
	
	authenticate();
	
?>

<html>

	<head>
		<title> Dashboard </title>
		<link rel='stylesheet' href='../../lib/bootstrap-4.6.0-dist/css/bootstrap.min.css' />
		<link rel='stylesheet' href='styles/template.css' />
		<link rel='stylesheet' href='styles/dashboard.css' />
	</head>
	
	<body>
	
		<?php include("inc/template.php") ?>
		
		<div class='content'>
		
			<h3 class="c_heading" id="content_heading">  &nbsp; Dashboard <?php echo  show_msg() ?> </h3>
			
			<div class="dashboard" id="dashboard_div"> 
			
				<a href="news.php">
					<div id="news_box">
						<img src="../../images/news-icon.png" class="news-image" title="News"/> 
						<div class="num_news">
							<?php $all = total("total_news", ""); echo "000" . $all['news_total'] ?>
						</div>
						<div class="title"> News </div>
					</div>
				</a>
				
				<a href="categories.php">
					<div id="news_box">
						<img src="../../images/category-icon.png" class="categ-image" title="News"/> 
						<div class="num_categ">
							<?php $all = total("total_categ", ""); echo "000" . $all['categ_total'] ?>
						</div>
						<div class="title"> Categories </div>
					</div>
				</a>
				<a href="members.php">
					<div id="news_box">
						<img src="../../images/members-icon.png" class="members-image" title="News"/> 
						<div class="num_members"> 
							<?php $all = total("total_members", ""); echo "000" . $all['members_total'] ?>
						</div>
						<div class="title"> Members </div>
					</div>
				</a>
				
				<a href="../index.php">
					<div id="web_box">
						<img src="../../images/logo.png" class="web-image" title="News"/>
					</div>
				</a>
			
			
			</div>
			
		</div>
		
		<script>
		
			burger.addEventListener("click", function table_div()
			{
				if(content_heading.className == "c_heading")
				{
					content_heading.classList.add("content-heading");
				}else
				{
					content_heading.classList.remove("content-heading");
				}
				
				if(dashboard_div.className == "dashboard")
				{		
					dashboard_div.classList.add("dashboard_new");
					
				}else
				{
					dashboard_div.classList.remove("dashboard_new");
					//alert("xyz");
				}
				
			});
			
			
			
		</script>
		
	</body>

</html>