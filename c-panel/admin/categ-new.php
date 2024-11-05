<div class="categ-add-sec" id="add_categ_sec">
			
	<form action='categ-crud-process.php' method='post' enctype='multipart/form-data' id="form">
		
		<h3 id="form_heading"> Add new Category </h3>

		<input type='hidden' name='query' value='insert' />
		
		<span class="field_heading"> Title </span>
		<input type='text' name='title' class="field" placeholder="Category title"/>
		<br /><br />
	
		<span class="field_heading"> Cover </span>
		<input type='file' name='cover' class="field image_field" />
		<br /><br />
		
		<span class="field_heading"> Status </span>
		<div class="field radio">
			Enable <input type='radio' name='status' value='1' checked  />
			Disabled <input type='radio' name='status' value='0'  />
		</div>
		<a href="categories.php" class="cancel_btn" onclick="hide_categ_news()"> Cancel </a>
		<input type='submit' value='Save' class="save_btn"/>
	
	</form>

</div>