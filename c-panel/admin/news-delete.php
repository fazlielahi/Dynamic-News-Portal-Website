<div class="news-dlt-sec">
			
	<form action='news-crud-process.php' method='post' enctype='multipart/form-data' id="dltnews_form">
		
		<h3 class="form_heading"> Are You sure to Delete ? <a href="news.php" class="cross_btn"> 
			<i class="fa-solid fa-rectangle-xmark"></i> </a>  
		</h3>

		<input type='hidden' name='query' value='delete' />
		<input type='hidden' name='news_id' value="<?php echo $news['id']; ?>" />
		
		<h3 id="news_heading"> <?php echo $news['title']; ?> </h3>
		
		<div class="row1">
			<div class="col1">
				<p id="news_text"> <?php echo substr($news['text'], 0, 500); ?> ... </p>
			</div>
			<div class="col2">
				<div id="news_image"> <?php echo $image; ?> </div>
			</div>
		</div>	
		
		<div class="buttons">
			<a href="news.php" class="cancel_btn" onclick="hide_add_news()"> Cancel </a>
			<input type='submit' value='Confirm Delete' class="dlt_btn"/>
		</div>
	</form>
	
</div>