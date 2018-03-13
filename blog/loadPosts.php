<?php
		include 'authorize.php';
		$sql = "SELECT * from blogpost where status = '1' order by date desc;";
		$res = $conn->query($sql);
		if($res->num_rows>0){
    	  while($row=$res->fetch_assoc()){
    	  	echo "<div class = 'post'><h1>".$row['title']."</h1><h2>".$row['descript']."</h2><h4><a href=openBlog.php?id=".$row['id'].">Read More</a></h4><h5> written by:<a href='loadProfile.php?userID=".$row['blogger']."'>".$row['blogger']."</a><span style='margin-left:25px;'>Time:".$row['date']."</h5></div>";
    	  }
		}
		else
			echo "<h1 style= 'margin-left:25px;'>&nbsp;&nbsp;&nbsp;&nbsp;No blogposts to show</h1>";
	$conn->close();
?>
