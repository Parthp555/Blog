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
  		<li><a href="reviewBlog.php?stat=0">Review Blogposts</a></li>
  		<li><a href="permission.php">Permissions</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<br>
	<div class="posts">
	<?php
		include 'authorize.php';
		$sql = "SELECT * FROM users;";
		$res = $conn->query($sql);
		echo "<table class = 'users'><tr class ='heading'><td>User ID</td><td>Can Write Blog</td><td>Admin/Blogger<br></td><td>Profile</td></tr>";
		while($row=$res->fetch_assoc()){
			$stat="";
			$type = "";
			if($row['canWrite']==0)
				$stat = "Disallow";
			else
				$stat = "Allow";

			if($row['type']=='A')
				$type = "Admin";
			else
				$type = "Blogger";

			echo "<tr><td>".$row['userID']."</td><td><a href = 'permit.php?userID=".$row['userID']."'>".$stat."</a></td><td><a href = 'permit2.php?userID=".$row['userID']."&type=".$row['type']."'>".$type."</a></td><td><a href = 'loadProfile.php?userID=".$row['userID']."'>View Profile</a></td></tr>";
		}
		echo "</table>";
	?>
	</div>
</body>
</html>
