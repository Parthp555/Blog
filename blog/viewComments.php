<?php
  include 'authorize.php';
  $sql = "SELECT * from comments where id = ".$_GET['id']." order by time desc;";
  $res = $conn->query($sql);
  while($row=$res->fetch_assoc()){
    echo "<div class = comment><h4>".$row['userID']." wrote</h4><h3>".$row['comment']."</h3><h6>Time:".$row['time']."</h6></div>";
  }
  $conn->close();
?>
