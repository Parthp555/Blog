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
	<div class = "menu">
		<ul>
  		<li><a href="index.php">Home</a></li>
  		<?php
				session_start();
  			if(isset($_SESSION['logged'])){
  			  	echo "<li><a href='profile.php'>My Profile</a></li>";
  			  	echo "<li><a href='writeBlog.php?publish=0'>WriteBlog</a></li>";
  			  	echo "<li><a href='viewBlog.php'>MyBlogs</a></li>";
  			 }
  		?>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<?php
 			if(isset($_SESSION['logged']))
 				echo "<li><a href='logout.php'>Logout</a></li>";
 			else
 				echo "<li><a href='login.php?count=0'>Login</a></li>"

 		?>
		</ul>
	</div>
	<br>
	<div class="posts">
	<?php
		include 'authorize.php';
		$sql = "SELECT * from blogpost where id = '".$_GET['id']."';";
		$res = $conn->query($sql);
		if($res->num_rows>0){
    	  while($row=$res->fetch_assoc()){
    	  	$count = $conn->query("select count(*) as liked from likes where id = ".$row['id'].";");
    	  	$count = $count->fetch_assoc();
    	  	echo "<div class = 'post'><h1>".$row['title']."</h1><h2>".$row['post']."</h2><span class='likes'>liked by: ".$count['liked']." people</span><h5> written by:".$row['blogger']." Time:".$row['date']."</h5><p>";
					echo "<form action ='comment.php?id=".$_GET['id']."' method = 'post'><ul id = comment>";
					if(isset($_SESSION['logged']) && $row['blogger']!=$_SESSION['logged']){

						$sql = "select count(*) as num from likes where id = ".$_GET['id']." and userID like '".$_SESSION['logged']."';";
						$r = $conn->query($sql)->fetch_assoc()['num'];
						if($r==1){
							echo "<li><a href = 'like.php?src=0&id=".$_GET['id']."'><img src = dislike.png height = 25px width = 25px alt = Unlike /></a>";
						}
						else{
							echo "<li><a href = 'like.php?src=1&id=".$_GET['id']."'><img src = like.png height = 25px width = 25px alt = Like /></a>";
						}
					}
					echo "</li><li><textarea name = comment rows = 1 cols = 50 maxlength = 500 placeholder = 'share your views'></textarea></li><li><button type = submit>Comment</button></li></ul>";
					echo "</div>";
			  }
				include 'viewComments.php';
		}
		else{
			header("location:error.php");
		}
	?>
	</div>
</body>
</html>
