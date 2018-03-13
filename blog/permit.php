<?php
  session_start();
  include 'authorize.php';
  $userID = $_GET['userID'];
  $sql = "update users set canWrite = MOD(canWrite+1,2) where userID like'".$userID."';";
  $conn->query($sql);
  $status = $conn->query("select canWrite from users where userID like '".$userID."';")->fetch_assoc()['canWrite'];
  $msg = "You can write new blogposts now :)";
  //echo $status;
  if($status==0)
    $msg = "You cannot WriteBlogs anymore :(";
  $sql = "insert into notifications (`userID`,`descript`) values('".$userID."','Your write permissions have been updated.".$msg."');";
  $conn->query($sql);
  $conn->close();
  header("location:permission.php");
  exit();
?>
