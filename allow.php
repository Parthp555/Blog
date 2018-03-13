<?php
session_start();
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
	$sql = "update blogpost set status = '1' where id = ".$id.";";
	$conn->query($sql);
	$user = $conn->query("select blogger from blogpost where id = ".$id.";")->fetch_assoc()['blogger'];
	$sql = "insert into notifications (`userID`,`descript`) values('".$user."','You blog with blog id ".$id." is now available publicaly');";
	$conn->query($sql);
	header("location:reviewBlog.php?stat=1");
?>
