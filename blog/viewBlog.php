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
  		<li><a href="writeBlog.php?publish=0">WriteBlog</a></li>
  		<li><a href="viewBlog.php">MyBlogs</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<br>
	<div class="posts">
	<?php
	session_start();
	if(isset($_SESSION['del'])){
		unset($_SESSION['del']);
		echo "<script>alert('Blogpost deleted')</script>";
	}
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
		$sql = "SELECT * from blogpost where blogger like '".$user."' order by date desc;";
		$res = $conn->query($sql);
		if($res->num_rows>0){
    	  while($row=$res->fetch_assoc()){
    	  	echo "<div class = 'post'><h1>".$row['title']."<span style='float:right'><h5><a href='editBlog.php?id=".$row['id']."&publish=0'>Edit</a> | <a href='delete.php?id=".$row['id']."&&src=1'>Delete</a></h5></span></h1><h2>".$row['post']."</h2><h5> written by:".$row['blogger']." Time:".$row['date']."</h5><p></div>";
    	  }
		}
		else{
			echo "<h1> &nbsp;&nbsp;&nbsp;&nbsp;No blogposts to show</h1>";
		}
	$conn->close();
?>
	</div>
</body>
</html>
