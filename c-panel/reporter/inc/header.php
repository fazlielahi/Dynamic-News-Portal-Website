<?php

	$member_profile = member_profile();

?>


<div class="header" id="header">
	<img src="../../images/logo.png" class="logo" />
	<div class="member-profile" > 
		<div class="profile-img" > <img src="../../images/users/admin.jpg"/> </div>
		<ul > 
		
			<li onclick="profileshow()"> 
				<?php echo $member_profile["firstname"] . " " . $member_profile["lastname"]; ?>
				
				<small class="dropdown-icon"> &#x2B9F </small>	
					
				<ul class="profile-hidden-sec" id="profile_hidden">
					<li>  
						<a href="profile.php"> <img src="../../images/loginuser-img.png"/> My Profile </a> 
					</li>
					<li> 
						<a href="../admin/logout.php"> <img src="../../images/logout.png"/> Log out </a>
					</li> 
				</ul>
			
			</li>		
		</ul>
	</div>
</div>

<script src="../admin/js/sidebar.js"> </script>