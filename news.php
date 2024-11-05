<?php

	session_start();
	include("inc/database.php");
	include("inc/functions.php");
	include("inc/functions-general.php");
	$dir_images = "images/";
	$dir_media = "media/";
	
?>

<?php 
	
	if(!isset($_GET['id']))
	{
		die("Error: Invalid access");
		
	}else
	{
		$id = $_GET['id'];
	}
	
	if(!isset($_GET['type'])) //news or video
	{
		$type = "";
		
	}else
	{
		$type = $_GET['type'];
	}
	
	$container = "";
	
	if($type == 'news')
	{
		$news = get_news("", $id);
		
			if(is_file($dir_images . "news/large/" . $news['image']))
			{
				$image = " <img src='$dir_images/news/large/$news[image]' width='400' > ";
			}else
			{		
				$image = " <img src='$dir_images/default.jpg' width='400'> ";
			}
			
			$container .= "
				
					<div class='news_box'>

						<h3 class='news_heading'> $news[title] </h3>
						<span class='categ_name'> 
							$news[categ_title] | $news[author] | $news[created_at] 
						</span>
						<div class='image-box'>
							$image
						</div>
						<p class='news_text'> $news[text]  </p>
					</div>
				";
				
	}else if($type == 'video')
	{
		$vid = get_videos("", $id, "", "");
		
		//print_r($video);
		//die();
		
		if(is_file($dir_media . "videos/" . $vid['video']))
		{
			$video = " <video id='player1' controls preload='none' src='$dir_media/videos/$vid[video]' type='video/mp4' width='898' height='569'> </video>";
		}else
		{		
			$video = "no video ";
		}
			
		$container .= "
			
				<div class='news_box'>
					<h3 class='news_heading'> $vid[caption] </h3>
					<span class='categ_name'> 
						$vid[categ_title] | $vid[author] | $vid[created_at] 
					</span>
					<div class='video-box'>
						$video
					</div>
				</div>
				";
	}else{
	
		$news = get_news("", $id);
		
			if(is_file($dir_images . "news/large/" . $news['image']))
			{
				$image = " <img src='$dir_images/news/large/$news[image]' width='400' > ";
			}else
			{		
				$image = " <img src='$dir_images/default.jpg' width='400'> ";
			}
			
			$container .= "
				
					<div class='news_box'>

						<h3 class='news_heading'> $news[title] </h3>
						<span class='categ_name'> 
							$news[categ_title] | $news[author] | $news[created_at] 
						</span>
						<div class='image-box'>
							$image
						</div>
						<p class='news_text'> $news[text]  </p>
					</div>
				";
		
	}
	
	

?>

<html>

	<head>
		
		<title> <?php $news['title']; ?> </title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='stylesheet' href='styles/header.css' />
		<link rel='stylesheet' href='styles/sidebar.css' />
		<link rel='stylesheet' href='styles/footer.css' />
		<link rel='stylesheet' href='styles/news.css' />
		<link rel='stylesheet' href='lib/bootstrap-4.6.0-dist/css/bootstrap.min.css' />
		
		<!-- media player tags -->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelementplayer.css">
		<link rel="stylesheet" href="lib/media-player/jump-forward/jump-forward.css">
		<link rel="stylesheet" href="lib/media-player/skip-back/skip-back.css">
		<link rel="stylesheet" href="lib/media-player/speed/speed.css">
		
	</head>
	
	<body onresize="show_menu()">
	
		<div class='header' >
			<div class='menu'>
				<?php include("inc/header.php"); ?> 
			</div>
		</div>
		
		<div class='single_news'>
			<?php echo $container ?>
		</div>
		
		<div class='sidebar'> 
			<div class='top-stories-sec'>
				<?php include('inc/sidebar.php') ?>
			</div> 
		</div>
		
		<div class="clear"> </div>
		
		<div class="footer">
			<?php include("inc/footer.php"); ?> 
		</div>
		
		<!-- media player files -->
		
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelement-and-player.min.js"></script>
		
		<script src="lib/media-player/jump-forward/jump-forward.js"></script>
		<script src="lib/media-player/skip-back/skip-back.js"></script>
		<script src="lib/media-player/quality/quality.js"></script>
		<script src="lib/media-player/speed/speed.js"></script>
		<script src="lib/media-player/js/media-player.js"></script>
		
	
	</body>
	
</html>