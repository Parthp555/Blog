<?php
  include 'authorize.php';
  session_start();
  $sql  = "UPDATE notifications SET status = 1 where userID like '".$_SESSION['logged']."';";
  $conn->query($sql);
  $conn->close();
  header("location:notifications.php");
  exit();
?>
