<div class="news-add-sec" id='create_news_sec'>
			
	<form action='news-crud-process.php' method='post' enctype='multipart/form-data' id="createnew_form">
		
	
		<h3 id="form_heading"> Create new News <a href="news.php" class="cross_btn"> 
			<i class="fa-solid fa-rectangle-xmark"></i> </a>  
		</h3>

		<div class="container">
			<div class="row">
				<input type='hidden' name='query' value='insert' />
				<input type='hidden' name='author_id' value='<?php echo $_SESSION['member_id'] ?>' />
				
				<div class="col">

					<span class="field_heading"> Title </span>
					<input type='text' name='title' class="field" placeholder="News title"/>				
					
					<span class="field_heading"> Image </span>
					<input type='file' name='image' class="field img_field" class="field" />

				</div>
				
				<div class="col">

					<span class="field_heading"> Created On </span>
					<input type='datetime-local' name='created_at' class="field"/>
						
					<span class="field_heading"> Select Category </span>
					<select name='categ_id' class='field'> 
						<option Selected disabled> Category </option>
							<?php  get_categ_combo() ?>
					</select>
				</div>


			</div>

			<div class="row">
			
				<script src="../../lib/ckeditor.js"></script>

					<div class="col">
						<span class="field_heading"> Text </span>
						<div class="text">
							<textarea name='text' class="field" id="text">  </textarea>
						</div>
					</div>	

				<script>
					ClassicEditor
						.create(document.querySelector('#text'))
						.catch(error => {
							console.error(error);
						});
				</script>
			</div>

			<div class="row buttons">
				<a href="news.php" class="btn" onclick="hide_add_news()"> Cancel </a>
				<input type='submit' value='Save' class="btn active" />
			</div>
			

		</div>

	</form>
	
</div>