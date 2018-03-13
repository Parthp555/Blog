<?php
	$id = $_GET['id'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "blog";
	$conn = new mysqli($servername, $username, $password,$dbname);
	if ($conn->connect_error) {
			header("location:error.php");
			exit();
	}
	$user = $conn->query("select blogger from blogpost where id = ".$id.";")->fetch_assoc()['blogger'];
	$sql = "insert into notifications (`userID`,`descript`) values('".$user."','You blog with blog id ".$id." was deleted because of moderation policy');";
	$conn->query($sql);
	$sql = "delete from blogpost where id = ".$id.";";
	$conn->query($sql);
	if($_GET['src']==0)
	header("location:reviewBlog.php?stat=2");
	else{
		session_start();
		$_SESSION['del']=true;
		header("location:viewBlog.php");
	}
	$conn->close();
?>
