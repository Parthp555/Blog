<?php
	session_start();
		if($_GET['publish']==1){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "blog";
		$conn = new mysqli($servername, $username, $password,$dbname);
		if ($conn->connect_error) {
			header("location:error.php");
			exit();
		}
		$allowed = 0;
		if(isset($_SESSION['logged']))
		{
			$sql = "select canWrite as status from users where userID like '".$_SESSION['logged']."';";
			$res = $conn->query($sql);
			$row = $res->fetch_assoc();
			$allowed = $row['status'];
		}
		if($allowed==1){
		$sql = "SELECT * from blogpost where blogger like '".$_SESSION['logged']."' and title like'".$_POST['title']."';";
		$res = $conn->query($sql);
		if($res->num_rows==0){
    	  $sql = "INSERT INTO blogpost(`blogger`,`title`,`descript`,`post`) values('".$_SESSION['logged']."','".$_POST['title']."','".$_POST['descript']."','".$_POST['content']."');";
    	  $conn->query($sql);
    	  $_SESSION['publish']="yes";
    	  header("location:index.php");
    	  exit();
			}
			else{
				echo "<script>alert('Blogpost with similar title already written by you.');</script>";
			}
		}
		else {
				echo "<script>alert('You do not have permissions to write the blog. Please contact Admin')</script>";
		}
	$conn->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MyBlog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src='tinymce/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#content'
  });
  </script>
</head>
<body>
	<div class="header"><h2> MyBlog</h2>
			<p style="font-size: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;Express your views</p>
	</div>
	<br>
	<div class = "menu">
		<ul>
  		<li><a href="index.php">Home</a></li>
  		<li><a href="profile.php">My Profile</a></li>
  		<li><a href="writeBlog.php?publish=0">WriteBlog</a></li>
  		<li><a href="viewBlog.php">MyBlogs</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<br>
	<div class="main">
		<form method="post" action = "writeBlog.php?publish=1" class = "write" onsubmit="return check()">
			<input type="text" name="title" placeholder="Title" id ="title">
			<textarea name="descript" placeholder="A short description of your blog" id = "descript"></textarea>
			<textarea rows="25" cols="50" id = "content" name="content" placeholder="Your main blog content goes here"></textarea><p>
			<input type="submit" name="Publish" value="Post">
		</form>
	</div>
	<br>
	<script type="text/javascript">
		function check() {
			var title = document.getElementById('title').value;
			var content = document.getElementById('content').value;
			var desc = document.getElementById('descript').value;
			if(title=='')
			{
				alert("Title can't be blank");
				return false;
			}
			else if(desc==''){
				alert("Please provide a short description");
				return false;
			}
			else if(content==''){
				alert("Blogpost can't be empty.Please write something");
				return false;
			}
			return true;
		}
	</script>
</body>
</html>
