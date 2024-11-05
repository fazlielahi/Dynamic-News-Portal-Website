<?php

	//ADMIN PANEL LOGOUT PAGE

	session_start();
	include("../../inc/database.php");
	include("../../inc/functions.php"); /* functions public view */
	include("../../inc/functions-general.php");
	$dir_images = "../../images/";
	
	include("inc/functions.php"); /* functions admin panel */
	//echo $_COOKIE['member_id'];
	//die();
	unset($_SESSION['member_email']);
	unset($_COOKIE['member_id']);
	redirect("../index.php", "Successfully Loged Out", "Success");
	
?>
