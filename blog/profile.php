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
  		<li><a href="profile.php">My Profile</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<?php
 			session_start();
 			if(isset($_SESSION['logged']))
 				echo "<li><a href='logout.php'>logout</a></li>";
 		?>
		</ul>
	</div>
	<br>
	<?php
		if(isset($_SESSION['logged'])){
			$user = $_SESSION['logged'];
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
				echo "<div class = 'profile'><h1>".$row['name']."</h1><h3>Username : ".$row['userID']."<p>Profession : ".$row['profession']."<p>City : ".$row['city']."<p>E-Mail : ".$row['mail']."<p> Birthdate : ".$row['birthdate']."</h3></div>";
			}
			else{
				header("location:error.php");
				exit();
			}
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
			$conn->close();
		}
		else
		{
			echo "<h4>You need to login first.<a href='login.php?count=0'>click here to login</a></h4>";
		}
	?>
</body>
</html>
