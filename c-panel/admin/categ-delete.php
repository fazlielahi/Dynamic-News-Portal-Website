


<div class="modify_categ_sec" id="modify_categ_sec">
	
	<form action='categ-crud-process.php' method='post' enctype='multipart/form-data' id="form">
	
		<h3 id="form_heading">
			Are you sure to delete <u> <?php echo $categ['title']; ?> </u> category ? 
		</h3>
		
		<input type='hidden' name='query' value='delete' />
		<input type='hidden' name='categ_id' value="<?php echo $categ['id']; ?>" />

		<div class="image_dlt"> <?php echo $image; ?> </div>
		<a href="categories.php" class="cancel_btn"> Cancel </a>
		<input type='submit' value='Confirm Delete' class="save_btn"/>
	
	</form>

</div>
	