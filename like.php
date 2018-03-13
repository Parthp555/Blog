<?php
  session_start();
  include 'authorize.php';
  $id = $_GET['id'];
  $op = $_GET['src'];
  $user = $_SESSION['logged'];
  $sql = "";
  if($op==0)
    $sql = "DELETE FROM likes where id = '".$id."' and userID like '".$user."';";
  else{
      $userID = $conn->query("select blogger from blogpost where id = ".$id.";")->fetch_assoc()['blogger'];
      $notif = "INSERT INTO notifications (`userID`,`descript`) values ('".$userID."','".$user." liked your blogpost with blogID ".$id.".');";
      $conn->query($notif);
      $sql = "INSERT INTO likes values('".$id."','".$user."');";
  }
  $conn->query($sql);
  $conn->close();
  header("location:openBlog.php?id=".$id);
  exit();
?>
