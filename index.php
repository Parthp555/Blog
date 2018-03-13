<?php
 	session_start();
 	if(isset($_SESSION['reg'])){
 		unset($_SESSION['reg']);
 		echo "<script>alert('Registeration successful. Please check your E-mail')</script>";
 	}
 	if(isset($_SESSION['logged'])){
 		if($_SESSION['type']=='A')
 		header("location:adminHome.php");
 		else
 		header("location:bloggerHome.php");
 		exit();
 	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>MyBlog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<div class="header"><h2 title="Welcome to MyBlog">MyBlog</h2>
			<p style="font-size: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;Express your views</p>
	</div>
  <br>
  <div class="search">
		<form action="search.php" method="post">
			<input type = "text" placeholder = "Search user" name ="key">
			<button type="submit">Search</button>
		</form>
	</div>
  <br>
	<div class = "menu">
		<ul>
  		<li><a href="index.php">Home</a></li>
  		<?php
  			if(isset($_SESSION['logged'])){
  				echo "<li><a href='profile.php'>My Profile</a></li>";
  			}
  		?>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="login.php?count=0">Login</a></li>
		</ul>
	</div>
	<div class="posts">
	<?php
		include 'loadPosts.php';
	?>
	</div>
</body>
</html>
