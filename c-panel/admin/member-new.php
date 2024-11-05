<div class="member-add-sec" id="add_categ_sec">
			
	<form action='mem-crud-process.php' method='post' enctype='multipart/form-data' id="form">
		
		<h3 id="form_heading"> Register new member </h3>

		<input type='hidden' name='query' value='insert' />

		<div class="row1">

			<div class="col1">

				<span class="field_heading"> First Name </span>
				<input type='text' name='firstname' class="field" placeholder="First name"/>
				<br /><br />
				
				<span class="field_heading"> Password </span>
				<input type='password' name='password' class="field" placeholder="Create Password"/>
				<br /><br />	
			
				<span class="field_heading"> Phone </span>
				<input type='text' name='phone' class="field" placeholder="Phone"/>
				<br /><br />
				
				<span class="field_heading"> Address </span>
				<input type='text' name='address' class="field" placeholder="Address"/>
				<br /><br />
				
				<span class="field_heading"> Date of birth </span>
				<input type='text' name='dob' class="field" placeholder="Date of Birth"/>
				<br /><br />
				
			</div>

			<div class="col2">

				<span class="field_heading"> Last Name </span>
				<input type='text' name='lastname' class="field" placeholder="Last name"/>
				<br /><br />
	
				<span class="field_heading"> Email </span>
				<input type='email' name='email' class="field" placeholder="Create Email address"/>
				<br /><br />
				
				<span class="field_heading"> Gender </span>
				<select name='gender' class="field" >
					<option selected disabled > Select Gender </option>
					<option value="Male" > Male </option>
					<option value="Female" > Female  </option>
				</select>
				<br /><br />
				
				<span class="field_heading"> Photo </span>
				<input type='file' name='photo' class="field image_field" />
				<br /><br />
				
				<span class="field_heading"> Role </span>
				<select name='role' class="field " >
					<option selected disabled > Select role </option>
					<option value="1" > Administration </option>
					<option value="0" > Reporter  </option>
				</select>
				<br /><br />
				
			</div>

		</div>
	
		<div class="button">
			<a href="news.php" class="cancel_btn" onclick="hide_add_news()"> Cancel </a>
			<input type='submit' value='Register' class="save_btn"/>
		</div>
	</form>

</div>