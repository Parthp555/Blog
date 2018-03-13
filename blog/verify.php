<?php
	session_start();
	if(isset($_SESSION['publish'])){
 		echo "<script>alert('Blogpost submitted for moderation.');</script>";
		unset($_SESSION['publish']);
 	}
	if($_GET['userID']!=''){
		$user = $_GET['userID'];
		include 'authorize.php';
		$sql = "UPDATE users set verified = 1 where userID like '".$user."';";
		$conn->query($sql);
		$conn->close();
		$_SESSION['verified']=true;
		header("location:login.php?count=0");
		exit();
	}
?>