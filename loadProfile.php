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
	<div class = "menu">
		<ul>
  		<li><a href="index.php">Home</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<?php
 			session_start();
			if(isset($_SESSION['src'])){
				if($_SESSION['src']==0)
					echo "<script>alert('You stopped following ".$_GET['userID']."')</script>";
				else
					echo "<script>alert('You started following ".$_GET['userID']."')</script>";
				unset($_SESSION['src']);
			}
 			if(isset($_SESSION['logged']))
 				echo "<li><a href='logout.php'>logout</a></li>";
 			else
 				echo "<li><a href='login.php?count=0'>Login</a></li>";
 		?>
		</ul>
	</div>
	<br>
	<?php
		if(isset($_GET['userID'])){
			$user = $_GET['userID'];
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "blog";
			$conn = new mysqli($servername, $username, $password,$dbname);
			if ($conn->connect_error) {
				header("location:error.php");
				exit();
			}
			$sql = "select * from users where userID like '".$user."';";
			$res = $conn->query($sql);
			if($res->num_rows>0){
				$row = $res->fetch_assoc();
				echo "<div class = 'profile'><h1>".$row['name'];
				if(isset($_SESSION['logged']) && $_SESSION['logged']!=$user){
					$sql = "select count(*) as num from follows where userID like '".$_SESSION['logged']."'and following like '".$user."';";
					$r = $conn->query($sql)->fetch_assoc()['num'];
					if($r==1)
						echo "<span style = 'margin:25px;'><a href = 'network.php?src=0&userID=".$user."'><br><img src = 'unfollow.jpg' height 100px width = 150px alt = 'remove from network'/></a></span></h1>";
					else
					echo "<span style = 'margin:25px;'><a href = 'network.php?src=1&userID=".$user."'><br><img src = 'follow.jpg' height 75px width = 100px alt = 'add to network'/></a></span></h1>";
				}
				echo "<h3>Username : ".$row['userID']."<p>Profession : ".$row['profession']."<p>City : ".$row['city']."<p>E-Mail : ".$row['mail']."<p> Birthdate : ".$row['birthdate']."</h3>";
				echo "<h4><a href = 'allBlogs.php?userID=".$user."'>View All Blogposts</a></h4></div>";
				echo "<div class='profile'><ul>";
				$sql = "SELECT count(*) as num from follows where userID like'".$user."';";
				$count = $conn->query($sql)->fetch_assoc()['num'];
				echo "<li>->".$count." Following </li>";
				$sql = "SELECT count(*) as num from follows where Following like'".$user."';";
				$count = $conn->query($sql)->fetch_assoc()['num'];
				echo "<li>->".$count." Followers </li>";
				$sql = "SELECT count(*) as num from blogpost where blogger like'".$user."' and status = 1;";
				$count = $conn->query($sql)->fetch_assoc()['num'];
				echo "<li>->".$count." Posts </li></ul>";
			}
			else{
				header("location:error.php");
				exit();
			}
			$conn->close();
		}
		else
		{
			header("location:error.php");
			exit();
		}
	?>
</body>
</html>
