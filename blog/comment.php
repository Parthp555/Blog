<?php
  session_start();
  include 'authorize.php';
  $sql = "insert into comments(`id`,`userID`,`comment`) values(".$_GET['id'].",'".$_SESSION['logged']."','".$_POST['comment']."');";
  echo $sql;
  $conn->query($sql);
  $userID = $conn->query("select blogger from blogpost where id = '".$_GET['id']."';")->fetch_assoc()['blogger'];
  $notif = "INSERT INTO notifications (`userID`,`descript`) values ('".$userID."','".$_SESSION['logged']." commented on your blogpost with blogID ".$_GET['id'].".');";
  $conn->query($notif);
  $conn->close();
  header("location:openBlog.php?id=".$_GET['id']);
  exit();
?>
