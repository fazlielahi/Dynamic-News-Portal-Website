<?php

	//ADMIN PANEL CATEGORIES PAGE

	session_start();
	include("../../inc/database.php");
	include("../../inc/functions.php"); /* functions public view */
	include("../../inc/functions-general.php");
	$dir_images = "../../images/";
	
	include("inc/functions.php"); /* functions admin panel */
	
	authenticate();
	
	
	
?>

<?php

	$all_categ = get_categories("all_caregories"); 
	$categ_list = "";
	$sno = 0;
	
	foreach($all_categ as $categ)
	{
		$sno++;
		
		$categ_newstotal = total("categ_newstotal", $categ['id']);
		
		if($categ['status'] == 1)
		{
			$status = "Enabled";
		}else{
			
			$status = "Disabled";
		}
		
		if($categ['status'] == 1)
		{
			$categ_list .= "
		
				<tr>
					<td class='sno-td'> $sno </td>
					<td class='categtitle-td'> $categ[title] </td>
					<td class='author-td'> $categ[firstname] $categ[lastname] </td>  <!-- Author name --> 
					<td class='datetime-td'>  $categ[created_at] </td>
					<td class='total-td'> $categ_newstotal[news_total] </td>
					<td class='status-td'> $status </td>
					<td class='modify-td'> <a href='categories.php?edit_id=$categ[id]' class='btn'> 
						<img src='../../images/edit.png' onclick='show_categ_edit()' /> 
					</td>
					<td class='modify-td'> <a href='categories.php?dlt_id=$categ[id]' class='btn'>
						<img src='../../images/delete.png'/>  
					</td>
				</tr>
		
				";
		}else{
			
			$categ_list .= "
		
				<tr style='color: lightgray'>
					<td class='sno-td'> $sno </td>
					<td class='categtitle-td'> $categ[title] </td>
					<td class='author-td'> $categ[firstname] $categ[lastname] </td>  <!-- Author name --> 
					<td class='datetime-td'>   $categ[created_at]  </td>
					<td class='total-td'> $categ_newstotal[news_total] </td>
					<td class='status-td'> $status </td>
					<td class='modify-td'> <a href='categories.php?edit_id=$categ[id]' class='btn'> 
						<img src='../../images/edit.png' onclick='show_categ_edit()' /> 
					</td>
					<td class='modify-td'> <a href='categories.php?dlt_id=$categ[id]' class='btn '>
						<img src='../../images/delete.png'/>  
					</td>
				</tr>
		
				";
		}
		
	}
	
	
?>

<html>

	<head>
		<title> Categories </title>
		<link rel='stylesheet' href='../../lib/bootstrap-4.6.0-dist/css/bootstrap.min.css' />
		<link rel='stylesheet' href='styles/template.css' />
		<link rel='stylesheet' href='styles/categ.css' />
		<link rel='stylesheet' href='styles/categ-new.css' />
		<link rel='stylesheet' href='styles/categ-modify.css' />
	</head>
	
	<body>
	
		<?php include("inc/template.php") ?>
		
		<div class='content'>
		
			<h3 class="c_heading" id="content_heading" style="" > &nbsp; Categories

				<?php 
					if(!isset($_GET['dlt_id']) && !isset($_GET['edit_id']))
					{
						echo 	"<span onclick='show_categ_add()' class='btn create_btn'>
									Create new 
								</span>";
					}
				?>

			</h3>
			
			<div class="container-fluid ">
				
				<table class="table table-light table-hover" id="table">
					
					<tr class="header-row">
					
						<th class="sno-th" id="sno_th"> Sno </th>
						<th class="categtitle-th"> Category </th>
						<th class='author-th'> Author </th>
						<th class="datetime-th" id="datetime_th"> Created on </th>
						<th class='total-th'> Total news </th>
						<th class='status-th'> Status </th>
						<th class="modify-th" colspan='2'> Modify </th>
					
					</tr>
					
					<?php echo $categ_list; ?>
					
					<tr>
						<th></th>
					</tr>
					
				</table>
			</div>
		</div>
		
		<?php include("categ-new.php") ?>
		
		<?php 
			
			//for category edit
	
			if(!isset($_GET['edit_id']))
			{
				$edit_id = "";
			}else
			{
				$edit_id = $_GET['edit_id'];
				$categ = get_categories("", $edit_id);
			
				if(is_file($dir_images. "categories/" . $_SESSION['pre_image'] = $categ['cover']))
				{
					$image = "<img src='$dir_images/categories/$categ[cover]' />";
					
				}else{
					
					$image = "<img src='$dir_images/categories/default.jpg' />";
				}
				
				include("categ-edit.php");
			}
		?>
		
		<?php 
			
			//for category Delete
	
			if(!isset($_GET['dlt_id']))
			{
				$dlt_id = "";
			}else
			{
				$dlt_id = $_GET['dlt_id'];
				$categ = get_categories("", $dlt_id);
			
				if(is_file($dir_images. "categories/" . $_SESSION['pre_image'] = $categ['cover']))
				{
					$image = "<img src='$dir_images/categories/$categ[cover]' />";
					
				}else{
					
					$image = "<img src='$dir_images/categories/default.jpg' />";
				}
				
				include("categ-delete.php");
			}
		?>
		
		
		<script src='../../lib/fontawesome-free-6.4.2-web/js/all.min.js' > </script>
		<script src="js/categ.js"> </script>
	</body>

</html>