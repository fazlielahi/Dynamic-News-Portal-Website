<div class="modify_categ_sec" id="modify_categ_sec">
			
	<form action='categ-crud-process.php' method='post' enctype='multipart/form-data' id="form">
		
		<h3 id="form_heading"> Update Category </h3>

		<input type='hidden' name='query' value='update' />
		<input type='hidden' name='categ_id' value="<?php echo $categ['id']; ?>" />
		
		<span class="field_heading"> Title </span>
		<input type='text' name='title' class="field" placeholder="Category title"
			value="<?php echo $categ['title']; ?>"/>
		<br /><br />
	
		<div class="imageandstatus">
	
			<span class="field_heading"> Change Thumb </span>
			<input type='file' name='cover' class="field image_field" />
			
			
			<span class="status_heading"> Status </span>
			
			<div class="field radio" >
				Enabled <input type='radio' name='status' value='1' 
					<?php if($categ['status'] == '1')
							{
								echo "checked";	
							}
					?>  />
				Disabled <input type='radio' name='status' value='0' 
				
					<?php if($categ['status'] == '0')
							{
								echo "checked";	
							}
					?>/>
			</div>
			
		</div>
	
		<div class="pre_image">
			<?php echo $image  ?>
		</div>		
		<div class="clear"> </div>
		
		<a href="categories.php" class="cancel_btn" > Cancel </a>
		<input type='submit' value='Save' class="save_btn"/>
	
	</form>

</div>