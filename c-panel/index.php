<?php

	//ADMIN PANEL Login PAGE

	session_start();
	include("../inc/database.php");
	include("../inc/functions.php"); /* functions public view */
	include("../inc/functions-general.php");
	$dir_images = "../images/";
	
	include("admin/inc/functions.php"); /* functions admin panel */
	
?>

<html>

	<head>
		<title> Login to Continue </title>
		<link rel='stylesheet' href='../lib/bootstrap-4.6.0-dist/css/bootstrap.min.css' />
		<link rel='stylesheet' href='admin/styles/login.css' />
	</head>
	
	<body>
		
		<a href="../index.php" > <img src="../images/logo.png" class="logo" title="Economy Updates Dubai"/> </a>
		
		<div class="login-box" >
			
			<img src="../images/loginuser-img.png" class="loginuser_img"/>
			
			<h1 class="heading"> LOGin to COntinue </h1>
			<div class="message"> <?php show_msg() ?>  </div>
			<form action='login-process.php' method='post' >
				
				<span class="title1" onclick="title1addclass()"> Email </span>
				<input type='email' name='email' class="input-fields" onclick="title1addclass()"/>
				
				<span class="title2" onclick="title2addclass()" > Password </span>
				<input type='password' name='password' class="input-fields" onclick="title2addclass()"  />
				
				<input type='checkbox' name='rememberme' value="yes"  class="checkbox"/> <span class="remember"> Remember me </span>
				
				<input type="submit" value="Login" class="btn"/>
				
			</form>
			
		</div>
		
		<script>
			
			var field = document.querySelector(".input-fields");
			var title1 = document.querySelector(".title1");
			var title2 = document.querySelector(".title2");
			
			function title1addclass()
			{
				title1.classList.add("title1new");
				
			}
			

			function title2addclass()
			{
				title2.classList.add("title2new");
			}
			
		</script>
	
	</body>

</html>