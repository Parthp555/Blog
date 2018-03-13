<?php
	session_start();
	if(isset($_SESSION['publish'])){
 		echo "<script>alert('Blogpost submitted for moderation.');</script>";
		unset($_SESSION['publish']);
 	}
	if(!isset($_SESSION['logged']))
	{
		header("location:index.php");
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
	<div class="header"><h2 title="Welcome to MyBlog">MyBlog<span style="float:right; margin: 5px;"><a href="notifications.php"><img src="notif.png" alt="Notification" height="40px" width="40px"></a></span></h2>
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
  		<li><a href="profile.php">My Profile</a></li>
  		<li><a href="writeBlog.php?publish=0">WriteBlog</a></li>
  		<li><a href="viewBlog.php">MyBlogs</a></li>
		<li><a href="networkBlog.php" title="View Blogs of your network">FollowERS/ING</a></li>
  		<li><a href="reviewBlog.php?stat=0">Review Blogposts</a></li>
  		<li><a href="permission.php">Permissions</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="posts">
	<?php
		include 'loadPosts.php';
	?>
	</div>
</body>
</html>
