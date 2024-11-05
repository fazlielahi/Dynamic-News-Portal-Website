<div class="news-edit-sec" id="">

	<form action='news-crud-process.php' method='post' enctype='multipart/form-data' id="form">

		<h3 id="form_heading"> Update News <a href="news.php" class="cross_btn">
				<i class="fa-solid fa-rectangle-xmark"></i> </a>
		</h3>

		<div class="container">

			<div class="row">

				<div class="col">
					<input type='hidden' name='query' value='update' />
					<input type='hidden' name='news_id' value="<?php echo $news['id']; ?>" />

					<span class="field_heading"> Title </span>
					<input type='text' name='title' class="field" placeholder="Category title"
					value="<?php echo $news['title']; ?>" />

					<span class="field_heading"> Change Image </span>
					<input type='file' name='image' class="field img_field" class="image_field" />

					<span class="field_heading"> Status </span>
					<div class="field status">
						Enabled <input type='radio' name='status' value='1' <?php if($news['status']=='1' ) { echo "checked" ; } ?>
						/>
						Disabled <input type='radio' name='status' value='0' <?php if($news['status']=='0' ) { echo "checked" ; } ?>
						/>
					</div>

					<span class="field_heading"> Change Category </span>
					<select name='category_id' class='field cobmo_field'>
						<option Selected value="<?php echo $news['category_id']?> "> Categories </option>
						<?php get_categ_combo() ?>
					</select>

				</div>

				<div class="col">
				
					<div class="pre_image">
						<?php echo $image ?>
					</div>

				</div>

			</div>

			<div class="row">
			
			<script src="../../lib/ckeditor.js"></script>

				<div class="col">
					<span class="field_heading"> Text </span>
					<div class="textarea">
						<textarea name='text' class="field" id="text"> <?php echo $news['text']; ?> </textarea>
					</div>
				</div>	

			</div>

			<script>
				ClassicEditor
					.create(document.querySelector('#text'))
					.catch(error => {
						console.error(error);
					});
			</script>

			<div class="row buttons">
				<a href="news.php" class="btn" onclick="hide_add_news()"> Cancel </a>
				<input type='submit' value='Save' class="btn active" />
			</div>

		</div>


</form>

</div>