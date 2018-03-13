<?php
	session_start();
	if(isset($_SESSION['publish'])){
 		echo "<script>alert('Blogpost submmitted for moderation.');</script>";
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
	<div class="header"><h2> MyBlog<span style="float:right; margin: 5px;"><a href="notifications.php"><img src="notif.png" alt="Notification" height="40px" width="40px"></a></span></h2>
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
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
		<br>
		<ul>
			<li><a href = "markNotifs.php">Mark all as read</a></li>
			<li><a href = "allNotifs.php">All notifications</a></li>
		</ul>
	</div>
	<br>
	<div class="posts">
		<?php
			include 'authorize.php';
			$sql = "SELECT * FROM notifications where userID like '".$_SESSION['logged']."' AND status=0 order by time desc;";
			$res = $conn->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc())
					echo "<div class = notif><h2>".$row['descript']."</h2><h5>Time:".$row['time']."</h5></div>";
			}
			else {
				echo "<h1><p><center>No new Notifiactions";
			}
		?>
	</div>
</body>
</html>
