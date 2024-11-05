<?php

	$member_profile = member_profile();
	
?>

<link rel="stylesheet" href="styles/sidebar.css" />

<div class="sidebar" id="sidebar">

	<div class="user-profile" id="user_profile"> 
	
		<div class="profile" id="profile_pic"> <img src="../../images/users/admin.jpg"/> </div>
		
		<h3 class="member_name" id="member_name">
		
			&nbsp; 
			<?php echo substr($member_profile["firstname"] . " " . $member_profile["lastname"], 0,17); ?> 
			
		</h3>
		
		<div class="online" id='online'> 
			&nbsp; <span class="dot_online"> &bull; </span> Online 
		</div>
		
	</div>
	
	<h3 class="heading" id="heading" title="Quick Access">  Quick Access </h3>
	
	<img src="../../images/quick-access.png" id="quick_access" title="Quick Access"/>
	
	<div class="menu">

		<a href="dashboard.php" >
			<img src="../../images/dashboard-icon.png" class="menu_icon" title="Dashboard" />  
			<span class="menu-text">  Dashboard </span>
		</a>
		
		<a href='categories.php' >
			<img src="../../images/category-icon.png" class="menu_icon" title="Categories"/>
			<span class="menu-text"> Categories </span> 
		</a>

		<a href='news.php' > 
			<img src="../../images/news-icon.png" class="menu_icon" title="News"/> 
			<span class="menu-text"> News </span>
		</a>

		<a href='members.php' > 
			<img src="../../images/members-icon.png" class="menu_icon" title="Members"/> 
			<span  class="menu-text"> Members </span>
		</a>

		<a href='../../index.php'>
			<img src="../../images/web-icon.png" class="menu_icon" title="Website"/> 
			<span  class="menu-text"> WEBSITE </span>
		</a>
		
	</div>

</div>

<div class="header" id="header">
	<div class="burger-icon" id="burger"> <img src="../../images/burger-icon.png" title="Sidebar" onclick="hidesidebar(); table_div()"/> </div>
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
						<a href="logout.php"> <img src="../../images/logout.png"/> Log out </a>
					</li> 
				</ul>
			
			</li>		
		</ul>
	</div>
</div>

<script src="js/sidebar.js"> </script>