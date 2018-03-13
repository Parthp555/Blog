<head>
	<title>MyBlog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<div class="header"><h3> MyBlog</h3>
			<h5>Express your views</h5>
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
 	    <li><a href="contactUs.php">Contact Us</a></li>
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
	 $key = $_POST['key'];
   echo "<div style='background-color:#001433;color:white;padding-left:20px;padding-top:5px;'>Search results for : ".$key."</div>";
	 $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "blog";
		$conn = new mysqli($servername, $username, $password,$dbname);
		if ($conn->connect_error) {
			header("location:error.php");
			exit();
		}
		$sql = "SELECT * from users where userID like '%".$key."%';";
    $res = $conn->query($sql);
    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
          echo "<div class = 'post'><h1>".$row['name']."</h1><h2>".$row['userID']."</h2><h5><a href ='loadProfile.php?userID=".$row['userID']."'>View Profile</a></h5></div>";
        }
    }
    else{
      echo "<h1> NO USER PROFILES WITH GIVEN KEYWORD</h1>";
    }
    $conn->close();
?>
	</div>
</body>
</html>
