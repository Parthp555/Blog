<?php
  include 'authorize.php';
  $userID = $_GET['userID'];
  $type='';
  if($_GET['type']=='A')
    $type = 'B';
  else
    $type = 'A';
  $sql = "update users set type = '".$type."' where userID like'".$userID."';";
  $msg="";
  if($type=='A')
    $msg = "Administrator";
  else
    $msg = "Blogger";
  $notif = "INSERT INTO notifications (`userID`,`descript`) values ('".$userID."','Permissions were updated, you are ".$msg." now.');";

  $conn->query($notif);
  $conn->query($sql);
  $conn->close();
  header("location:permission.php");
  exit();
?>
