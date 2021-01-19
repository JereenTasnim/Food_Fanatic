<?php
session_start();
include 'lib/config.php';
include 'lib/Database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="images/title.ico" />
	<link rel="stylesheet" type="text/css" href="CSS/headerStyle.css">
	<title>Home - Food Fanatic</title>

	<script type="text/javascript">
		function search(string){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveXObject("XMLHTTP");
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("search_div").innerHTML = xmlhttp.responseText;
				}
               
			}
			xmlhttp.open("GET", "search.php?s="+string+"&id=1", true);
			xmlhttp.send(null);
		}
        
        
	</script>
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="logo-hotline">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt="Food Fanatic Logo" width="65%"></a>
				</div>

				<div class="search-box">
					<input type="text" name="search" id="search" onkeyup="search(this.value)">
				</div>

				<div class="search-div" id="search_div"></div>
                <div class="search-area" id="search_area"></div>

				<div class="hotline">
					<img src="images/hotline.png" alt="Food Fanatic Hotline" width="100%">
				</div>
			</div>

			<div class="navigation">
			 	<?php if(!isset($_SESSION['name'])) {?>
					<a class="gap" href="login.php">Login</a>
					<a href="register.php">Register</a>
					<a href="list.php">List of Restaurants</a>
				<?php }
				else { ?>
					<a href="list.php">List of Restaurants</a>
					<a href="add_branch.php"><?php echo $_SESSION['name']; ?></a>
					<a href="logout.php">Log out</a>
				<?php } ?>
			</div>
		</div>