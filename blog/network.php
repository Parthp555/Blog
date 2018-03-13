<?php
  session_start();
  include 'authorize.php';
  $user = $_SESSION['logged'];
  $follow = $_GET['userID'];
  $op = $_GET['src'];
  $sql = "";
  $_SESSION['src'] = $op;
  if($op==0){
    $notif = "INSERT INTO notifications (`userID`,`descript`) values ('".$follow."','".$user." unfollowed you');";
    $conn->query($notif);
    $sql = "DELETE FROM follows where userID like '".$user."' and following like '".$follow."';";
  }
  else {
    $notif = "INSERT INTO notifications (`userID`,`descript`) values ('".$follow."','".$user." followed you');";
    $conn->query($notif);
    $sql = "INSERT INTO follows values('".$user."','".$follow."');";
  }
  echo $sql;
  $conn->query($sql);
  $conn->close();
  header("location:loadProfile.php?userID=".$follow);
  exit();
?>
